<?php

declare(strict_types=1);

namespace Maartenpaauw\Filament\OpeningHours\Resources;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Maartenpaauw\Filament\OpeningHours\Enums\Day;
use Maartenpaauw\Filament\OpeningHours\Models\OpeningHour;
use Maartenpaauw\Filament\OpeningHours\Resources\OpeningHourResource\Pages\CreateOpeningHour;
use Maartenpaauw\Filament\OpeningHours\Resources\OpeningHourResource\Pages\EditOpeningHour;
use Maartenpaauw\Filament\OpeningHours\Resources\OpeningHourResource\Pages\ListOpeningHours;
use Maartenpaauw\Filament\OpeningHours\Resources\OpeningHourResource\Pages\ViewOpeningHour;

final class OpeningHourResource extends Resource
{
    protected static ?string $model = OpeningHour::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make()
                    ->tabs([
                        Tab::make('general')
                            ->label('filament-opening-hours::labels.general')
                            ->translateLabel()
                            ->icon('heroicon-o-building-storefront')
                            ->schema([
                                TextInput::make('name')
                                    ->label('filament-opening-hours::labels.name')
                                    ->translateLabel()
                                    ->required()
                                    ->minLength(1)
                                    ->maxLength(255),
                            ]),
                        self::dayTab(Day::Monday),
                        self::dayTab(Day::Tuesday),
                        self::dayTab(Day::Wednesday),
                        self::dayTab(Day::Thursday),
                        self::dayTab(Day::Friday),
                        self::dayTab(Day::Saturday),
                        self::dayTab(Day::Sunday),
                    ]),
            ])
            ->columns(1);
    }

    private static function dayTab(Day $day): Tab
    {
        return Tab::make($day->label())
            ->label($day->label())
            ->translateLabel()
            ->icon('heroicon-o-clock')
            ->schema([
                Grid::make()
                    ->relationship($day->relationship())
                    ->mutateRelationshipDataBeforeCreateUsing(static fn () => [
                        'day' => $day,
                    ])
                    ->columns(1)
                    ->schema([
                        TextInput::make('description')
                            ->label('filament-opening-hours::labels.description')
                            ->translateLabel()
                            ->minLength(1)
                            ->maxLength(255),
                        Repeater::make('timeRanges')
                            ->label('filament-opening-hours::labels.time_ranges')
                            ->addActionLabel(trans('filament-opening-hours::labels.add_time_range'))
                            ->translateLabel()
                            ->relationship()
                            ->defaultItems(1)
                            ->minItems(0)
                            ->schema([
                                TextInput::make('description')
                                    ->label('filament-opening-hours::labels.description')
                                    ->translateLabel()
                                    ->minLength(1)
                                    ->maxLength(255),
                                Grid::make()
                                    ->schema([
                                        TimePicker::make('start')
                                            ->label('filament-opening-hours::labels.start')
                                            ->translateLabel()
                                            ->seconds(false)
                                            ->required(),
                                        TimePicker::make('end')
                                            ->label('filament-opening-hours::labels.end')
                                            ->translateLabel()
                                            ->seconds(false)
                                            ->required(),
                                    ]),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOpeningHours::route('/'),
            'create' => CreateOpeningHour::route('/create'),
            'view' => ViewOpeningHour::route('/{record}'),
            'edit' => EditOpeningHour::route('/{record}/edit'),
        ];
    }
}
