<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Resources\OpeningHourResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Maartenpaauw\Filament\OpeningHours\Resources\OpeningHourResource;

final class CreateOpeningHour extends CreateRecord
{
    protected static string $resource = OpeningHourResource::class;
}
