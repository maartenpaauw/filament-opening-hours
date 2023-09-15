<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;
use Maartenpaauw\Filament\OpeningHours\Enums;

/**
 * @property Enums\Day $day
 * @property string $description
 * @property Collection<array-key, TimeRange> $timeRanges
 */
final class Day extends Model
{
    protected $table = 'opening_hours_days';

    protected $fillable = ['day', 'description'];

    protected $casts = [
        'id' => 'int',
        'opening_hour_id' => 'int',
        'day' => Enums\Day::class,
        'description' => 'string',
    ];

    protected $with = ['timeRanges'];

    public function timeRanges(): MorphMany
    {
        return $this->morphMany(TimeRange::class, 'time_rangeable')
            ->orderBy('start')
            ->orderBy('end');
    }
}
