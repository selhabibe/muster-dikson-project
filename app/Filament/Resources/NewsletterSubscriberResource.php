<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsletterSubscriberResource\Pages;
use App\Models\NewsletterSubscriber;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscriptionConfirmation;

class NewsletterSubscriberResource extends Resource
{
    protected static ?string $model = NewsletterSubscriber::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Marketing';

    protected static ?string $navigationLabel = 'Newsletter Subscribers';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Forms\Components\Toggle::make('is_active')
                    ->label('Active')
                    ->required(),
                Forms\Components\DateTimePicker::make('subscribed_at')
                    ->label('Subscribed Date')
                    ->required(),
                Forms\Components\DateTimePicker::make('unsubscribed_at')
                    ->label('Unsubscribed Date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subscribed_at')
                    ->label('Subscribed Date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('unsubscribed_at')
                    ->label('Unsubscribed Date')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('is_active')
                    ->label('Status')
                    ->options([
                        '1' => 'Active',
                        '0' => 'Inactive',
                    ]),
                Filter::make('subscribed_at')
                    ->form([
                        Forms\Components\DatePicker::make('subscribed_from'),
                        Forms\Components\DatePicker::make('subscribed_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['subscribed_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('subscribed_at', '>=', $date),
                            )
                            ->when(
                                $data['subscribed_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('subscribed_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('toggle_status')
                    ->label(fn (NewsletterSubscriber $record): string => $record->is_active ? 'Deactivate' : 'Activate')
                    ->icon(fn (NewsletterSubscriber $record): string => $record->is_active ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                    ->color(fn (NewsletterSubscriber $record): string => $record->is_active ? 'danger' : 'success')
                    ->action(function (NewsletterSubscriber $record): void {
                        $record->update([
                            'is_active' => !$record->is_active,
                            'unsubscribed_at' => $record->is_active ? now() : null,
                        ]);
                        
                        $status = $record->is_active ? 'activated' : 'deactivated';
                        Notification::make()
                            ->title("Subscriber {$status} successfully")
                            ->success()
                            ->send();
                    }),
                Tables\Actions\Action::make('resend_confirmation')
                    ->label('Resend Confirmation')
                    ->icon('heroicon-o-paper-airplane')
                    ->color('info')
                    ->action(function (NewsletterSubscriber $record): void {
                        try {
                            Mail::to($record->email)
                                ->send(new NewsletterSubscriptionConfirmation($record->email));
                                
                            Notification::make()
                                ->title('Confirmation email sent successfully')
                                ->success()
                                ->send();
                        } catch (\Exception $e) {
                            Notification::make()
                                ->title('Failed to send confirmation email')
                                ->body($e->getMessage())
                                ->danger()
                                ->send();
                        }
                    })
                    ->visible(fn (NewsletterSubscriber $record): bool => $record->is_active),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    BulkAction::make('activate_subscribers')
                        ->label('Activate Subscribers')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(function (Collection $records): void {
                            $records->each(function ($record) {
                                $record->update([
                                    'is_active' => true,
                                    'unsubscribed_at' => null,
                                ]);
                            });
                            
                            Notification::make()
                                ->title('Subscribers activated successfully')
                                ->success()
                                ->send();
                        }),
                    BulkAction::make('deactivate_subscribers')
                        ->label('Deactivate Subscribers')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(function (Collection $records): void {
                            $records->each(function ($record) {
                                $record->update([
                                    'is_active' => false,
                                    'unsubscribed_at' => now(),
                                ]);
                            });
                            
                            Notification::make()
                                ->title('Subscribers deactivated successfully')
                                ->success()
                                ->send();
                        }),
                    BulkAction::make('send_bulk_email')
                        ->label('Send Confirmation Email')
                        ->icon('heroicon-o-paper-airplane')
                        ->color('info')
                        ->action(function (Collection $records): void {
                            $successCount = 0;
                            $failCount = 0;
                            
                            $records->each(function ($record) use (&$successCount, &$failCount) {
                                if ($record->is_active) {
                                    try {
                                        Mail::to($record->email)
                                            ->send(new NewsletterSubscriptionConfirmation($record->email));
                                        $successCount++;
                                    } catch (\Exception $e) {
                                        $failCount++;
                                    }
                                }
                            });
                            
                            Notification::make()
                                ->title("Email sending completed")
                                ->body("{$successCount} emails sent successfully, {$failCount} failed")
                                ->success()
                                ->send();
                        }),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNewsletterSubscribers::route('/'),
            'create' => Pages\CreateNewsletterSubscriber::route('/create'),
            'edit' => Pages\EditNewsletterSubscriber::route('/{record}/edit'),
        ];
    }    
}
