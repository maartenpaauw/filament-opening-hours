<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Commands;

use Illuminate\Console\Command;

final class FilamentOpeningHoursCommand extends Command
{
    public $signature = 'filament-opening-hours';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
