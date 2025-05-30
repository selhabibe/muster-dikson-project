<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;
use App\Models\Cart;
use App\Models\Shop\Category;
use App\Models\Shop\Customer;
use App\Models\Shop\Order;
use App\Models\Shop\OrderItem;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $sessionId = $request->session()->getId();
        $cartItems = Cart::where('session_id', $sessionId)->with('product')->get();

        $sessionId = $request->session()->getId();
        $cartItems = Cart::where('session_id', $sessionId)->with('product')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $posts = Post::paginate(10);

        $recentPosts = Post::orderBy('created_at', 'desc')->take(3)->get();

        return view('pages.home', compact('cartItems', 'total', 'posts', 'recentPosts'));
    }

    public function showMusterProducts()
    {
        $products = Product::whereHas('brand', function ($query) {
            $query->where('slug', 'muster');
        })->get();

        return view('pages.shop_muster', ['products' => $products]);
    }

    public function showDiksonProducts()
    {
        $products = Product::whereHas('brand', function ($query) {
            $query->where('slug', 'dikson');
        })->get();
        return view('pages.shop_dikson', ['products' => $products]);
    }

    public function cart()
    {
        $products = Product::whereHas('categories', function ($query) {
            $query->where('name', 'dikson');
        });

        return view('pages.cart', ['products' => $products]);
    }



    public function tahnkYou()
    {
        $products = Product::whereHas('categories', function ($query) {
            $query->where('name', 'dikson');
        });

        return view('pages.thank_you', ['products' => $products]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string',
//            'first_name' => 'required|string',
//            'last_name' => 'required|string',
//            'company_name' => 'nullable|string',
//            'country' => 'required|string',
//            'address1' => 'required|string',
//            'address2' => 'nullable|string',
//            'city' => 'required|string',
//            'state' => 'required|string',
//            'zip' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
//           'order_notes' => 'nullable|string',
//            'create_account' => 'nullable|boolean',
//            'different_address' => 'nullable|boolean',
        ]);

        $customer = Customer::where('email', $validated['email'])->first();
        if (!$customer) {
            $customer = Customer::create($validated);
        }

        $orderData = [
            'status' => 'new',
            'total_price' => $this->calculateTotalPrice($request),
            'currency' => 'MAD',
            'shipping_price' => 50,
            'shipping_method' => 'standard',
            'number' => $this->generateOrderNumber(),
            'shop_customer_id' => $customer->getOriginal()['id'],
        ];


        $order = Order::create($orderData);
        $this->createOrderItem($request,$order);


//        if ($request->boolean('different_address')) {
//            $order->address()->create([
//                'address1' => $request->input('shipping_address1'),
//                'address2' => $request->input('shipping_address2'),
//                'city' => $request->input('shipping_city'),
//                'state' => $request->input('shipping_state'),
//                'zip' => $request->input('shipping_zip'),
//                'country' => $request->input('shipping_country'),
//            ]);
//        }

        $sessionId = $request->session()->getId();

        $cartItems = Cart::where('session_id', $sessionId)->with('product')->get();

        Cart::where('session_id', $sessionId)->delete();

        session()->forget('cart');

        return redirect()->route('thankyou')->with('success', 'Votre commande a été passée avec succès.');
    }

    private function calculateTotalPrice($request)
    {

        $sessionId = $request->session()->getId();

        $cartItems = Cart::where('session_id', $sessionId)->with('product')->get();

        $sessionId = $request->session()->getId();
        $cartItems = Cart::where('session_id', $sessionId)->with('product')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return $total;
    }

    private function createOrderItem($request,$order)
    {
        $idOrder = $order->getOriginal()['id'];
        $sessionId = $request->session()->getId();

        $cartItems = Cart::where('session_id', $sessionId)->with('product')->get();

        foreach ($cartItems as $item) {

            $orderItemArray = [
                'qty' =>  $item->quantity,
                'unit_price' =>  $item->product->price,
                'shop_order_id' =>  $idOrder,
                'shop_product_id' =>  $item->product->id,
            ];
             $OrderItem = OrderItem::create($orderItemArray);
        }
    }


    private function generateOrderNumber()
    {
        return 'ORD-' . strtoupper(uniqid());
    }

    public function showAllCategorie()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function showCategorie(Category $category)
    {

        $products = $category->products;

        return view('categories.show', compact('category', 'products'));
    }

    
    public function ourbrands()
    {
        $products = Product::take(4)->get();
        return view('pages.ourbrands', compact('products'));
    }

    public function beauty()
    {
        $products = Product::take(4)->get();
        return view('pages.beauty', compact('products'));
    }

    public function hairstyle()
    {
        $categories = Category::where('parent_id', function($query) {
            $query->select('id')
                ->from('shop_categories')
                ->where('name', 'coiffure');
        })->get();
        $products = Product::take(4)->get();

        return view('pages.hairstyle', compact('categories','products'));
    }
}
