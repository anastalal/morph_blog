<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
class StatsOverview extends BaseWidget
{
    use HasWidgetShield;
    protected function getStats(): array
    {
        return [
            Stat::make('مقالات', Post::count())   ->description('عدد المقالات') ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('مستخدمين', User::count())   ->description('عدد المستخدمين') ->descriptionIcon('heroicon-o-users'),
        ];
    }
}
