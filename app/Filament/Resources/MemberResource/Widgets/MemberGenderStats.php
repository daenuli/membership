<?php

namespace App\Filament\Resources\MemberResource\Widgets;

use App\Models\Member;
use Filament\Facades\Filament;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MemberGenderStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Laki-laki', Member::query()->where('gender', 'male')->count()),
            Stat::make('Perempuan', Member::query()->where('gender', 'female')->count()),
        ];
    }

    public static function canView(): bool
    {
        return Filament::auth()->user()->hasRole('admin');
    }
}
