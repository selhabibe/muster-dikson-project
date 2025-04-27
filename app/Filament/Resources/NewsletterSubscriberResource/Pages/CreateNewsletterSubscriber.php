<?php

namespace App\Filament\Resources\NewsletterSubscriberResource\Pages;

use App\Filament\Resources\NewsletterSubscriberResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscriptionConfirmation;

class CreateNewsletterSubscriber extends CreateRecord
{
    protected static string $resource = NewsletterSubscriberResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function afterCreate(): void
    {
        $subscriber = $this->record;
        
        if ($subscriber->is_active) {
            try {
                Mail::to($subscriber->email)
                    ->send(new NewsletterSubscriptionConfirmation($subscriber->email));
            } catch (\Exception $e) {
                Notification::make()
                    ->title('Failed to send confirmation email')
                    ->body($e->getMessage())
                    ->danger()
                    ->send();
            }
        }
    }
}
