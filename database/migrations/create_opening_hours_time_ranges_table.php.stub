<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('opening_hours_time_ranges', static function (Blueprint $table): void {
            $table->id();
            $table->morphs('time_rangeable', 'time_ranges_time_rangeable_type_time_rangeable_id_index');
            $table->time('start');
            $table->time('end');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }
};
