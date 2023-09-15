<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Enums;

use Filament\Support\Contracts\HasLabel;

enum Day: string implements HasLabel
{
    case Monday = 'monday';
    case Tuesday = 'tuesday';
    case Wednesday = 'wednesday';
    case Thursday = 'thursday';
    case Friday = 'friday';
    case Saturday = 'saturday';
    case Sunday = 'sunday';

    public function getLabel(): ?string
    {
        return $this->label();
    }

    public function label(): string
    {
        return trans("filament-opening-hours::days.$this->value");
    }

    public function relationship(): string
    {
        return $this->value;
    }

    public function toString(): string
    {
        return $this->value;
    }
}
