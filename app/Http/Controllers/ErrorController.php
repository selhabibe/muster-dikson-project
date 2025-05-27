<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class ErrorController extends Controller
{
    /**
     * Show the 404 error page.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function show404(Request $request)
    {
        // Initialize default values
        $cartItems = collect();
        $cartTotal = 0;

        try {
            // Try to get cart data safely
            if ($request->hasSession()) {
                $sessionId = $request->session()->getId();
                if ($sessionId) {
                    $cartItems = Cart::where('session_id', $sessionId)->with('product')->get();
                    $cartTotal = $cartItems->sum(function ($item) {
                        if ($item->product) return $item->product->price * $item->quantity;
                        else return 0;
                    });
                }
            }
        } catch (\Exception $e) {
            // Log the error for debugging but continue with empty cart
            \Log::warning('Error loading cart data for 404 page: ' . $e->getMessage());
            $cartItems = collect();
            $cartTotal = 0;
        }

        try {
            return response()->view('pages.404', [
                'cartItems' => $cartItems,
                'cartTotal' => $cartTotal
            ], 404);
        } catch (\Exception $e) {
            // If the main 404 view fails, use the simple fallback
            \Log::error('Error rendering 404 page: ' . $e->getMessage());
            return response()->view('pages.404-simple', [], 404);
        }
    }
}
