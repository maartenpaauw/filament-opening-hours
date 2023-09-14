<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Maartenpaauw\Filament\OpeningHours\Models\TimeRange;

final class TimeRangeFactory extends Factory
{
    protected $model = TimeRange::class;

    public function definition(): array
    {
        $startHour = $this->faker->randomElement(range(0, 22));
        $endHour = $this->faker->randomElement(range($startHour, 23));

        $startMinute = $this->faker->randomElement(range(0, 30, 5));
        $endMinute = $this->faker->randomElement(range($startMinute, 59, 5));

        return [
            'start' => sprintf('%02d:%02d', $startHour, $startMinute),
            'end' => sprintf('%02d:%02d', $endHour, $endMinute),
        ];
    }
}
