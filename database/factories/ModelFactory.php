<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Maartenpaauw\Filament\OpeningHours\Models\OpeningHours;

final class OpeningHourFactory extends Factory
{
    protected $model = OpeningHours::class;

    public function definition(): array
    {
        return [];
    }
}

