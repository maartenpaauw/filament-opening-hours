<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * @property DateTimeInterface $start
 * @property DateTimeInterface $end
 * @property-read string $notation
 */
final class TimeRange extends Model
{
    protected $table = 'filament_opening_hours_time_ranges';

    protected $fillable = ['start', 'end'];

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function notation(): Attribute
    {
        return Attribute::get(function (): string {
            return sprintf('%s-%s', $this->start->format('H:i'), $this->end->format('H:i'));
        });
    }
}
