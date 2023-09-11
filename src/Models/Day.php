<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Maartenpaauw\Filament\OpeningHours\Enums;

/**
 * @property string $day
 * @property Collection<array-key, TimeRange> $timeRanges
 */
final class Day extends Model
{
    protected $table = 'filament_opening_hours_days';

    protected $fillable = ['day'];

    protected $casts = [
        'day' => Enums\Day::class,
    ];

    protected $with = ['timeRanges'];

    public function timeRanges(): HasMany
    {
        return $this->hasMany(TimeRange::class)
            ->orderBy('start')
            ->orderBy('end');
    }
}
