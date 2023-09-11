<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Maartenpaauw\Filament\OpeningHours\Models\TimeRange;

final class RangeFactory extends Factory
{
    protected $model = TimeRange::class;

    public function definition(): array
    {
        return [
            'start' => $this->faker->time('H:i'),
            'end' => $this->faker->time('H:i'),
        ];
    }
}

