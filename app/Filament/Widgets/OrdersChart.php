<?php

namespace App\Filament\Widgets;

use App\Models\Shop\Order;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class OrdersChart extends ChartWidget
{
    protected static ?string $heading = 'Commandes par mois';

    protected static ?int $sort = 1;

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        return $this->getMonthlyOrders();
    }

    public function getMonthlyOrders()
    {
        $monthlyOrders = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month')
            ->toArray();

        $orderData = [];
        for ($i = 1; $i <= 12; $i++) {
            $orderData[] = $monthlyOrders[$i]['total'] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Commandes',
                    'data' => $orderData,
                    'fill' => 'start',
                ],
            ],
            'labels' => ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
        ];
    }
}
