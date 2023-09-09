<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Maartenpaauw\Filament\OpeningHours\Resources\OpeningHourResource;

final class FilamentOpeningHoursPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-opening-hours';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([OpeningHourResource::class]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): FilamentOpeningHoursPlugin
    {
        return app(FilamentOpeningHoursPlugin::class);
    }

    public static function get(): FilamentOpeningHoursPlugin
    {
        /** @var static $plugin */
        $plugin = filament(app(FilamentOpeningHoursPlugin::class)->getId());

        return $plugin;
    }
}
