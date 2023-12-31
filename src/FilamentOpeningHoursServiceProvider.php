<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours;

use Filament\Support\Assets\Asset;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Filesystem\Filesystem;
use Maartenpaauw\Filament\OpeningHours\Models\Day;
use Maartenpaauw\Filament\OpeningHours\Models\Exception;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class FilamentOpeningHoursServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-opening-hours';

    public static string $viewNamespace = 'filament-opening-hours';

    public function configurePackage(Package $package): void
    {
        $package->name(self::$name)
            ->hasTranslations()
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('maartenpaauw/filament-opening-hours');
            });

        $configFileName = $package->shortName();

        if (file_exists($package->basePath("/../config/{$configFileName}.php"))) {
            $package->hasConfigFile();
        }

        if (file_exists($package->basePath('/../database/migrations'))) {
            $package->hasMigrations($this->getMigrations());
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(self::$viewNamespace);
        }
    }

    public function packageRegistered(): void
    {
        Relation::morphMap([
            'day' => Day::class,
            'exception' => Exception::class,
        ]);
    }

    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );

        FilamentAsset::registerScriptData(
            $this->getScriptData(),
            $this->getAssetPackageName()
        );

        // Icon Registration
        FilamentIcon::register($this->getIcons());

        // Handle Stubs
        if (app()->runningInConsole()) {
            foreach (app(Filesystem::class)->files(__DIR__ . '/../stubs/') as $file) {
                $this->publishes([
                    $file->getRealPath() => base_path("stubs/filament-opening-hours/{$file->getFilename()}"),
                ], 'filament-opening-hours-stubs');
            }
        }
    }

    protected function getAssetPackageName(): ?string
    {
        return 'maartenpaauw/filament-opening-hours';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
            'create_opening_hours_table',
            'create_opening_hours_exceptions_table',
            'create_opening_hours_days_table',
            'create_opening_hours_time_ranges_table',
        ];
    }
}
