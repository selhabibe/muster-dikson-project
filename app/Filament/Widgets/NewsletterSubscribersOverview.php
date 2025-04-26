<?php

namespace App\Filament\Widgets;

use App\Models\NewsletterSubscriber;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class NewsletterSubscribersOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '30s';
    
    protected function getStats(): array
    {
        $totalSubscribers = NewsletterSubscriber::count();
        $activeSubscribers = NewsletterSubscriber::where('is_active', true)->count();
        $inactiveSubscribers = $totalSubscribers - $activeSubscribers;
        
        $newSubscribersThisMonth = NewsletterSubscriber::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
            
        $newSubscribersLastMonth = NewsletterSubscriber::whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->count();
            
        $percentChange = $newSubscribersLastMonth > 0 
            ? round((($newSubscribersThisMonth - $newSubscribersLastMonth) / $newSubscribersLastMonth) * 100, 1)
            : 0;
            
        $changeIcon = $percentChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down';
        $changeColor = $percentChange >= 0 ? 'success' : 'danger';
        
        return [
            Stat::make('Total Subscribers', $totalSubscribers)
                ->description('All-time subscribers')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary'),
                
            Stat::make('Active Subscribers', $activeSubscribers)
                ->description($activeSubscribers > 0 ? round(($activeSubscribers / $totalSubscribers) * 100) . '% of total' : '0% of total')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
                
            Stat::make('New This Month', $newSubscribersThisMonth)
                ->description($percentChange . '% from last month')
                ->descriptionIcon($changeIcon)
                ->color($changeColor),
        ];
    }
}
