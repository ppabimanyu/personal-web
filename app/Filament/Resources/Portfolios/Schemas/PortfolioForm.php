<?php

namespace App\Filament\Resources\Portfolios\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class PortfolioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make()
                    ->schema([
                        ToggleButtons::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'archived' => 'Archived',
                                'on_progress' => 'On Progress',
                            ])
                            ->icons([
                                'draft' => Heroicon::OutlinedPencil,
                                'archived' => Heroicon::OutlinedArchiveBox,
                                'on_progress' => Heroicon::OutlinedClock,
                            ])
                            ->inline(),
                        DatePicker::make('published_at')
                            ->label('Published At')
                            ->native(false)
                            ->placeholder('Select a date and time'),
                        FileUpload::make('image_path')
                            ->label('Thumbnail Image')
                            ->image()
                            ->imageEditor()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('4:3')
                            ->disk('public')
                            ->directory('portfolios')
                            ->visibility('public')
                            ->maxSize(1024)
                            ->columnSpanFull(),
                        Section::make('Details')
                            ->description('Add title and description.')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                                Textarea::make('description')
                                    ->rows(5)
                                    ->maxLength(65535)
                                    ->columnSpanFull(),
                            ]),
                        Section::make('Details')
                            ->description('Add project and GitHub URLs.')
                            ->schema([

                                TextInput::make('project_url')
                                    ->url()
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                                TextInput::make('github_url')
                                    ->url()
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                            ]),

                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
