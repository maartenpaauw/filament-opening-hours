<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\OpeningHours\OpeningHours as SpatieOpeningHours;

/**
 * @property array $monday
 * @property array $tuesday
 * @property array $wednesday
 * @property array $thursday
 * @property array $friday
 * @property array $saturday
 * @property array $sunday
 */
final class OpeningHours extends Model
{
    use SoftDeletes;

    protected $table = 'filament_opening_hours';

    protected $casts = [
        'monday' => 'array',
        'tuesday' => 'array',
        'wednesday' => 'array',
        'thursday' => 'array',
        'friday' => 'array',
        'saturday' => 'array',
        'sunday' => 'array',
    ];

    protected $attributes = [
        'monday' => [],
        'tuesday' => [],
        'wednesday' => [],
        'thursday' => [],
        'friday' => [],
        'saturday' => [],
        'sunday' => [],
    ];

    private function openingHours(): SpatieOpeningHours
    {
        return SpatieOpeningHours::create([
            'monday' => $this->monday,
            'tuesday' => $this->tuesday,
            'wednesday' => $this->wednesday,
            'thursday' => $this->thursday,
            'friday' => $this->friday,
            'saturday' => $this->saturday,
            'sunday' => $this->sunday,
        ]);
    }
}
