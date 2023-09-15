<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Maartenpaauw\Filament\OpeningHours\Enums;
use Maartenpaauw\Filament\OpeningHours\Models\Day;

final class DayFactory extends Factory
{
    protected $model = Day::class;

    public function definition(): array
    {
        return [
            'opening_hour_id' => OpeningHourFactory::new(),
            'day' => $this->faker->randomElement(Enums\Day::cases()),
            'description' => Str::limit($this->faker->text(), 250),
        ];
    }
}
