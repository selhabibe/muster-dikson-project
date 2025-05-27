<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();

        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        View::composer('*', function ($view) {
            try {
                $request = request();

                // Check if session is available and started
                if ($request->hasSession() && $request->session()->isStarted()) {
                    $sessionId = $request->session()->getId();
                    $cartItems = Cart::where('session_id', $sessionId)->with('product')->get();

                    // Calculate the total
                    $total = $cartItems->sum(function ($item) {
                        if ($item->product) return $item->product->price * $item->quantity;
                        else return 0;
                    });

                    $view->with([
                        'cartItems' => $cartItems,
                        'cartTotal' => $total
                    ]);
                } else {
                    // Provide empty defaults when session is not available
                    $view->with([
                        'cartItems' => collect(),
                        'cartTotal' => 0
                    ]);
                }
            } catch (\Exception $e) {
                // Fallback to empty cart if any error occurs
                $view->with([
                    'cartItems' => collect(),
                    'cartTotal' => 0
                ]);
            }
        });
    }
}
