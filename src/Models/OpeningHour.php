<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Maartenpaauw\Filament\OpeningHours\Enums;
use Spatie\OpeningHours\OpeningHours;

final class OpeningHour extends Model
{
    protected $table = 'opening_hours';

    protected $fillable = ['name'];

    protected $casts = [
        'id' => 'int',
        'openable_type' => 'string',
        'openable_id' => 'int',
        'name' => 'string',
    ];

    protected $with = ['days'];

    public function days(): HasMany
    {
        return $this->hasMany(Day::class)
            ->orderBy('day');
    }

    public function monday(): HasOne
    {
        return $this->day(Enums\Day::Monday);
    }

    public function tuesday(): HasOne
    {
        return $this->day(Enums\Day::Tuesday);
    }

    public function wednesday(): HasOne
    {
        return $this->day(Enums\Day::Wednesday);
    }

    public function thursday(): HasOne
    {
        return $this->day(Enums\Day::Thursday);
    }

    public function friday(): HasOne
    {
        return $this->day(Enums\Day::Friday);
    }

    public function saturday(): HasOne
    {
        return $this->day(Enums\Day::Saturday);
    }

    public function sunday(): HasOne
    {
        return $this->day(Enums\Day::Sunday);
    }

    private function day(Enums\Day $day): HasOne
    {
        return $this->hasOne(Day::class)
            ->ofMany(
                ['id' => 'MAX'],
                static fn (Builder $query): Builder => $query->where('day', '=', $day),
            );
    }

    public function openingHours(): OpeningHours
    {
        return OpeningHours::create(
            $this->days()
                ->get()
                ->mapWithKeys(static fn (Day $day): array => [
                    $day->day->toString() => array_filter([
                        'data' => $day->description,
                        'hours' => $day->timeRanges
                            ->map(static fn (TimeRange $timeRange): array => array_filter([
                                'data' => $timeRange->description,
                                'hours' => $timeRange->notation,
                            ]))
                            ->all(),
                    ]),
                ])
                ->all(),
        );
    }
}
