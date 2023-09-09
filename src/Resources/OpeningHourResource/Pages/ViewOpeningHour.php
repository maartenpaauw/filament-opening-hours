<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Resources\OpeningHourResource\Pages;

use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Maartenpaauw\Filament\OpeningHours\Resources\OpeningHourResource;

final class ViewOpeningHour extends ViewRecord
{
    protected static string $resource = OpeningHourResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
