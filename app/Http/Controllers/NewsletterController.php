<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterSubscriptionConfirmation;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class NewsletterController extends Controller
{
    /**
     * Subscribe a user to the newsletter
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function subscribe(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'privacy_check' => 'required|accepted',
        ], [
            'email.required' => 'Veuillez entrer votre adresse email.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'privacy_check.required' => 'Vous devez accepter de recevoir des informations par email.',
            'privacy_check.accepted' => 'Vous devez accepter de recevoir des informations par email.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Check if the email already exists
        $existingSubscriber = NewsletterSubscriber::where('email', $request->email)->first();

        if ($existingSubscriber) {
            // If the subscriber exists but is inactive, reactivate them
            if (!$existingSubscriber->is_active) {
                $existingSubscriber->update([
                    'is_active' => true,
                    'subscribed_at' => now(),
                    'unsubscribed_at' => null,
                ]);

                return redirect()->back()->with('success', 'Vous êtes à nouveau inscrit à notre newsletter !');
            }

            // If already active, just return a message
            return redirect()->back()->with('info', 'Vous êtes déjà inscrit à notre newsletter.');
        }

        // Create a new subscriber
        $subscriber = NewsletterSubscriber::create([
            'email' => $request->email,
            'is_active' => true,
            'subscribed_at' => now(),
        ]);

        // Send confirmation email
        try {
            Mail::to($subscriber->email)
                ->send(new NewsletterSubscriptionConfirmation($subscriber->email));
        } catch (\Exception $e) {
            // Log the error but don't stop the process
            \Log::error('Failed to send newsletter confirmation email: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Merci de vous être inscrit à notre newsletter !');
    }

    /**
     * Unsubscribe a user from the newsletter
     *
     * @param Request $request
     * @param string $email
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unsubscribe(Request $request, $email)
    {
        $email = base64_decode($email);

        $subscriber = NewsletterSubscriber::where('email', $email)->first();

        if (!$subscriber) {
            return redirect()->route('index')->with('error', 'Adresse email non trouvée dans notre liste de diffusion.');
        }

        $subscriber->update([
            'is_active' => false,
            'unsubscribed_at' => now(),
        ]);

        return redirect()->route('index')->with('success', 'Vous avez été désinscrit de notre newsletter avec succès.');
    }
}
