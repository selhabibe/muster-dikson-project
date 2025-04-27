<?php

namespace App\Filament\Pages;

use App\Models\NewsletterSubscriber;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\HtmlString;
use App\Mail\NewsletterMail;

class NewsletterManagement extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Marketing';

    protected static ?string $navigationLabel = 'Send Newsletter';

    protected static ?int $navigationSort = 2;

    protected static string $view = 'filament.pages.newsletter-management';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('subject')
                    ->label('Email Subject')
                    ->required()
                    ->maxLength(255),
                RichEditor::make('content')
                    ->label('Email Content')
                    ->required()
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('newsletter-attachments')
                    ->helperText(new HtmlString('You can use <code>{{email}}</code> to include the subscriber\'s email in the content.')),
                Toggle::make('active_only')
                    ->label('Send to active subscribers only')
                    ->default(true)
                    ->helperText('If checked, the email will only be sent to active subscribers.'),
            ])
            ->statePath('data');
    }

    public function sendNewsletter()
    {
        $data = $this->form->getState();

        $query = NewsletterSubscriber::query();

        if ($data['active_only']) {
            $query->where('is_active', true);
        }

        $subscribers = $query->get();

        if ($subscribers->isEmpty()) {
            Notification::make()
                ->title('No subscribers found')
                ->warning()
                ->send();

            return;
        }

        $successCount = 0;
        $failCount = 0;

        foreach ($subscribers as $subscriber) {
            try {
                // Replace placeholders in content
                $personalizedContent = str_replace('{{email}}', $subscriber->email, $data['content']);

                // Send email
                Mail::to($subscriber->email)
                    ->send(new NewsletterMail($data['subject'], $personalizedContent, $subscriber->email));

                $successCount++;
            } catch (\Exception $e) {
                $failCount++;
            }
        }

        Notification::make()
            ->title('Newsletter sent')
            ->body("Successfully sent to {$successCount} subscribers. Failed: {$failCount}")
            ->success()
            ->send();

        $this->form->fill();
    }
}
