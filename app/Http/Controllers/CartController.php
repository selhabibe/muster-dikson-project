<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Shop\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    // Add to Cart Method
//    public function addToCart(Request $request)
//    {
//        $validatedData = $request->validate([
//            'product_id' => 'required|exists:products,id',
//            'quantity' => 'required|integer|min:1'
//        ]);
//
//        $sessionId = $request->session()->getId(); // Get the current session ID
//
//        // Check if the item already exists in the cart
//        $cartItem = Cart::where('session_id', $sessionId)
//            ->where('product_id', $validatedData['product_id'])
//            ->first();
//
//        if ($cartItem) {
//            // If item exists, increment the quantity
//            $cartItem->quantity += $validatedData['quantity'];
//            $cartItem->save();
//        } else {
//            // Create a new cart item
//            Cart::create([
//                'session_id' => $sessionId,
//                'product_id' => $validatedData['product_id'],
//                'quantity' => $validatedData['quantity']
//            ]);
//        }
//
//        return response()->json(['success' => 'Item added to cart successfully!']);
//    }

    // Get Cart Items Method for Ajax Calls
    public function getCartItems(Request $request)
    {
        $sessionId = $request->session()->getId();
        $cartItems = Cart::where('session_id', $sessionId)->with('product')->get();

        $total = 0;
        $html = '';

        foreach ($cartItems as $item) {
            $html .= "
                <div class='cart-item'>
                    <p>{$item->product->name} - Quantity: {$item->quantity}</p>
                    <button class='remove-item' data-id='{$item->id}'>Remove</button>
                </div>
            ";
            $total += $item->product->price * $item->quantity;
        }

        return response()->json(['html' => $html, 'total' => $total]);
    }

    // Remove Item from Cart
    public function removeCartItem($id, Request $request)
    {
        $sessionId = $request->session()->getId();
        $cartItem = Cart::where('session_id', $sessionId)->where('id', $id)->firstOrFail();
        $cartItem->delete();

        return response()->json(['success' => 'Item removed from cart!']);
    }

    public function showCart(Request $request)
    {
        $sessionId = $request->session()->getId();
        $cartItems = Cart::where('session_id', $sessionId)->with('product')->get();

        $sessionId = $request->session()->getId();
        $cartItems = Cart::where('session_id', $sessionId)->with('product')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('cart', compact('cartItems', 'total'));
    }

    // Add a product to the cart
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:shop_products,id', // Ensure the table name is correct here
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($request->product_id); // This should use your Product model

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity; // Update quantity
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'quantity' => $request->quantity,
                'price' => $product->price,
                'photo' => $product->image, // Assuming you have an image field
            ];
        }


        $sessionId = $request->session()->getId();
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Check if product already exists in the cart
        $cartItem = Cart::where('session_id', $sessionId)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'session_id' => $sessionId,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        // Get updated cart data for response
        $cartItems = Cart::where('session_id', $sessionId)->with('product')->get();
        $cartTotal = $cartItems->sum(function ($item) {
            return $item->product ? ($item->product->price * $item->quantity) : 0;
        });
        $cartCount = $cartItems->sum('quantity');

        return response()->json([
            'success' => 'Item added to cart successfully!',
            'cart_count' => $cartCount,
            'cart_total' => $cartTotal,
            'product_name' => $product->name
        ]);
    }

    // Get cart data for AJAX updates
    public function getCartData(Request $request)
    {
        $sessionId = $request->session()->getId();
        $cartItems = Cart::where('session_id', $sessionId)->with('product')->get();

        $cartTotal = $cartItems->sum(function ($item) {
            return $item->product ? ($item->product->price * $item->quantity) : 0;
        });

        $cartCount = $cartItems->sum('quantity');

        $cartItemsData = $cartItems->map(function ($item) {
            return [
                'id' => $item->id,
                'product_id' => $item->product_id,
                'name' => $item->product->name,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
                'image' => $item->product->image,
                'subtotal' => $item->product->price * $item->quantity
            ];
        });

        return response()->json([
            'success' => true,
            'cart_count' => $cartCount,
            'cart_total' => $cartTotal,
            'cart_items' => $cartItemsData
        ]);
    }

    // Update cart item quantity
    public function updateCartItem(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::find($request->input('cart_id'));
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return response()->json(['success' => 'Cart item updated successfully!']);
    }

    public function update(Request $request)
    {
        try {
            \Log::info('Cart update request received', $request->all());

            $request->validate([
                'cart_id' => 'required|integer',
                'quantity' => 'required|integer|min:1',
            ]);

            $cartId = $request->input('cart_id');
            $quantity = $request->input('quantity');
            $sessionId = $request->session()->getId();

            \Log::info('Cart update params', [
                'cart_id' => $cartId,
                'quantity' => $quantity,
                'session_id' => $sessionId
            ]);

            // Find the cart item by ID and session
            $cartItem = Cart::where('id', $cartId)
                ->where('session_id', $sessionId)
                ->with('product')
                ->first();

            \Log::info('Cart item found', ['cart_item' => $cartItem ? $cartItem->toArray() : null]);

            if (!$cartItem) {
                \Log::warning('Cart item not found', ['cart_id' => $cartId, 'session_id' => $sessionId]);
                return response()->json(['error' => 'Cart item not found'], 404);
            }

            if (!$cartItem->product) {
                \Log::error('Product not found for cart item', ['cart_item_id' => $cartId]);
                return response()->json(['error' => 'Product not found for cart item'], 404);
            }

            // Update the quantity
            $cartItem->quantity = $quantity;
            $cartItem->save();

            // Calculate new subtotal for this item
            $itemSubtotal = $cartItem->product->price * $quantity;

            // Calculate new cart total
            $cartItems = Cart::where('session_id', $sessionId)->with('product')->get();
            $cartTotal = $cartItems->sum(function ($item) {
                return $item->product ? ($item->product->price * $item->quantity) : 0;
            });

            \Log::info('Cart update successful', [
                'item_subtotal' => $itemSubtotal,
                'cart_total' => $cartTotal
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Quantity updated successfully',
                'item_subtotal' => number_format($itemSubtotal, 2),
                'cart_total' => number_format($cartTotal, 2)
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Cart update validation error', ['errors' => $e->errors()]);
            return response()->json(['error' => 'Validation failed', 'details' => $e->errors()], 422);
        } catch (\Exception $e) {
            \Log::error('Cart update error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return response()->json(['error' => 'Failed to update cart item: ' . $e->getMessage()], 500);
        }
    }


    public function updateQuantity(Request $request)
    {

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $cartItems = session('cart.items', []);

        if (isset($cartItems[$productId])) {
            $cartItems[$productId]['quantity'] = $quantity;

            session(['cart.items' => $cartItems]);

            $cartTotal = 0;
            foreach ($cartItems as $item) {
                $cartTotal += $item['price'] * $item['quantity'];
            }
            session(['cart.total' => $cartTotal]);

            return response()->json([
                'status' => 'Quantity updated!',
                'cartTotal' => number_format($cartTotal, 2), // Format the total to 2 decimal places
            ]);
        }

        return response()->json(['status' => 'Product not found in cart.'], 404);
    }

    public function checkout(Request $request)
    {
        $sessionId = $request->session()->getId();

        // Fetch cart items based on session ID
        $cartItems = Cart::where('session_id', $sessionId)->with('product')->get();


        $sessionId = $request->session()->getId();
        $cartItems = Cart::where('session_id', $sessionId)->with('product')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('pages.checkout', compact('cartItems', 'total'));

    }
}
