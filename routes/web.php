<?php

use App\Livewire\Form;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Mail\MyTestEmail;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Mail;
use \App\Http\Controllers\BlogController;

Route::get('form', Form::class);

//Route::view('/', 'pages.home')->name('index');
Route::get('/', [ShopController::class, 'index'])->name('index');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

//Route::get('/contact', function () {
//    return view('pages.contact-us');
//})->name('contact');

Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');





Route::get('/shop', function () {
    return view('pages.shop_dikson');
})->name('shop.index');

Route::get('/shop/muster', [ShopController::class, 'showMusterProducts'])->name('shop.muster');
Route::get('/shop/dikson', [ShopController::class, 'showDiksonProducts'])->name('shop.dikson');


// Cart routes
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
//Route::post('/cart/updatess', [CartController::class, 'updateCartItem'])->name('cart.updatesss');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeCartItem'])->name('cart.remove');
//Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');



Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/thank-you', [ShopController::class, 'tahnkYou'])->name('thankyou');

Route::get('/about-us', function () {
    return view('pages.about_us');
})->name('about_us');

Route::post('/place-order', [ShopController::class, 'store'])->name('order.store');

//Pages
//Route::get('/hairstyle', function () {
//    return view('pages.hairstyle');
//})->name('hairstyle');

Route::get('/hairstyle', [ShopController::class, 'hairstyle'])->name('hairstyle');


Route::get('/beauty', [ShopController::class, 'beauty'])->name('beauty');


Route::get('/illaminaction', function () {
    return view('pages.illaminaction');
})->name('illaminaction');


Route::get('/hygiene-safety', function () {
    return view('pages.coming-soon');
})->name('hygiene-safety');

Route::get('/video', function () {
    return view('pages.coming-soon');
})->name('video');

Route::get('/downloads', function () {
    return view('pages.coming-soon');
})->name('downloads');


Route::get('categories', [ShopController::class, 'showAllCategorie'])->name('categories.index');
Route::get('categories/{category}', [ShopController::class, 'showCategorie'])->name('categories.show');

Route::get('/post', [BlogController::class, 'recentelyPost'])->name('recentelyPost.show');
Route::get('/posts/{id}', [BlogController::class, 'show'])->name('posts.show');


Route::get('/testroute', function() {
    $name = "Funny Coder";

    Mail::to('soufianjill@gmail.com')->send(new MyTestEmail($name));
});

