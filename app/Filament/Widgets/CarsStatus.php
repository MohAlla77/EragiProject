<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Car;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Illuminate\Support\Facades\DB;

class CarsStatus extends BaseWidget
{
    protected function getStats(): array
    {
        return [


             // Stat::make('Unique views', '192.1k'),
            // Stat::make('Bounce rate', '21%'),
            // Stat::make('Average time on page', '3:12'),
            Stat::make('Total of User', User::count())
            ->description('Count of all Cars')
            ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
            ->chart([1,2,3,10,20,30])
            ->color('success'),

            Stat::make('Total of User',Car::where('status','NEW')->count())
            ->description('Count New Cars')
            ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
            ->chart([1,2,3,10,20,30])
            ->color('info'),

            Stat::make('Total of User',Car::where('status','Maintenace')->count())
            ->description('In Maintenance')
            ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
            ->chart([1,2,3,10,20,30])
            ->color('warning'),

            Stat::make('Total of User', Car::where('status','WAITING')->count())
            ->description('Waiting Cars')
            ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
            ->chart([1,2,3,10,20,30])
            ->color('danger'),

            Stat::make('Total of User', Car::where('status','DONE')->count())
            ->description('Done Cars')
            ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
            ->chart([1,2,3,10,20,30])
            ->color('success'),

            Stat::make('Total of User', DB::table('check_car')->count())
            ->description('Need To Check ')
            ->descriptionIcon('heroicon-m-user-group', IconPosition::Before)
            ->chart([1,2,3,10,20,30])
            ->color('gray')


        ];
    }
}
