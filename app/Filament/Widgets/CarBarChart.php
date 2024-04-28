<?php

namespace App\Filament\Widgets;

use App\Models\Car;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class CarBarChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected static ?string $maxHeight = '250px';

    protected function getData(): array
    {
        return [
            'labels' => ['WAITING', 'NEW', 'Maintenance', 'Check Car', 'DONE'],
            'datasets' => [
                [
                    'label' => 'Cars Live Status',
                    'data' => [
                        Car::where('status', 'WAITING')->count(),
                        Car::where('status', 'NEW')->count(),
                        Car::where('status', 'MAINTENACE')->count(),
                        DB::table('check_car')->count(),
                        Car::where('status', 'DONE')->count(),
                    ],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(174, 184, 173)',
                        'rgb(37, 207, 19)',
                    ],
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
