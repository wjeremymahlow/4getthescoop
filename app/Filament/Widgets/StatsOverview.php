<?php

namespace App\Filament\Widgets;

use App\Models\CateringRequest;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Pending Requests', CateringRequest::pending()->count())
                ->description('Awaiting review')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
            Stat::make('Upcoming Events', CateringRequest::confirmed()->upcoming()->count())
                ->description('Confirmed bookings')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('success'),
            Stat::make('This Month', CateringRequest::thisMonth()->count())
                ->description('Total requests')
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color('info'),
        ];
    }
}
