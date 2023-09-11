<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Maartenpaauw\Filament\OpeningHours\Models\Day;
use Maartenpaauw\Filament\OpeningHours\Enums;

final class DayFactory extends Factory
{
    protected $model = Day::class;

    public function definition(): array
    {
        return [
            'opening_hour_id' => OpeningHourFactory::new(),
            'day' => $this->faker->randomElement(Enums\Day::cases()),
        ];
    }
}

