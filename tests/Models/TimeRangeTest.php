<?php

declare(strict_types=1);

use Illuminate\Support\Carbon;
use Maartenpaauw\Filament\OpeningHours\Models\TimeRange;

it('should have a notation', function () {
    $timeRange = new TimeRange([
        'start' => Carbon::create(hour: 9, minute: 30),
        'end' => Carbon::create(hour: 17, minute: 30),
    ]);

    expect($timeRange->notation)->toEqual('09:30-17:30');
});
