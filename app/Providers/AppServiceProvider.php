<?php

namespace App\Providers;

use App\Models\Cart;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    public function boot(Request $request)
    {
        Model::unguard();

        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        // Configure Filament Language Switch
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['fr', 'en'])
                ->displayLocale('fr');
        });

        View::composer('*', function ($view) use ($request) {
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
        });
    }
}
