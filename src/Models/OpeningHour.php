<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

final class OpeningHour extends Model
{
    use SoftDeletes;

    protected $table = 'filament_opening_hours';

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
}
