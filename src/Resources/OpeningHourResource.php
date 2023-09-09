<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Resources;

use Filament\Resources\Resource;
use Maartenpaauw\Filament\OpeningHours\Models\OpeningHours;
use Maartenpaauw\Filament\OpeningHours\Resources\OpeningHourResource\Pages\CreateOpeningHour;
use Maartenpaauw\Filament\OpeningHours\Resources\OpeningHourResource\Pages\EditOpeningHour;
use Maartenpaauw\Filament\OpeningHours\Resources\OpeningHourResource\Pages\ListOpeningHours;
use Maartenpaauw\Filament\OpeningHours\Resources\OpeningHourResource\Pages\ViewOpeningHour;

final class OpeningHourResource extends Resource
{
    protected static ?string $model = OpeningHours::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function getPages(): array
    {
        return [
            'index' => ListOpeningHours::route('/'),
            'create' => CreateOpeningHour::route('/create'),
            'view' => ViewOpeningHour::route('/{record}'),
            'edit' => EditOpeningHour::route('/{record}/edit'),
        ];
    }
}
