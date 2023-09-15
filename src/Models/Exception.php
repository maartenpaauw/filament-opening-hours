<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

final class Exception extends Model
{
    protected $table = 'opening_hours_exceptions';

    protected $fillable = ['date', 'description'];

    protected $casts = [
        'id' => 'int',
        'opening_hour_id' => 'int',
        'date' => 'date',
    ];

    protected $with = ['timeRanges'];

    public function timeRanges(): MorphMany
    {
        return $this->morphMany(TimeRange::class, 'time_rangeable')
            ->orderBy('start')
            ->orderBy('end');
    }
}
