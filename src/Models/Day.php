<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Maartenpaauw\Filament\OpeningHours\Enums;

/**
 * @property Enums\Day $day
 * @property string $description
 * @property Collection<array-key, TimeRange> $timeRanges
 */
final class Day extends Model
{
    use SoftDeletes;

    protected $table = 'filament_opening_hours_days';

    protected $fillable = ['day', 'description'];

    protected $casts = [
        'id' => 'int',
        'opening_hour_id' => 'int',
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
