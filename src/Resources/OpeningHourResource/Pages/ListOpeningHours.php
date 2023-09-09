<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Resources\OpeningHourResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Maartenpaauw\Filament\OpeningHours\Resources\OpeningHourResource;

final class ListOpeningHours extends ListRecords
{
    protected static string $resource = OpeningHourResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
