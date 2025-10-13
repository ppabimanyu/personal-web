<?php

namespace App\Filament\Resources\Portfolios\Tables;

use App\Filament\Resources\Portfolios\PortfolioResource;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PortfoliosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->columns([
                Stack::make([
                    ImageColumn::make('image_path')
                        ->imageWidth('100%')
                        ->imageHeight(200)
                        ->disk('public'),
                    TextColumn::make('title')
                        ->lineClamp(2)
                        ->size(TextSize::Large)
                        ->weight(FontWeight::Bold)
                        ->searchable(),
                    TextColumn::make('description')
                        ->lineClamp(3),
                    TextColumn::make('status')
                        ->color(fn (string $state): string => match ($state) {
                            'on_progress' => 'warning',
                            'draft' => 'primary',
                            'archived' => 'danger',
                            default => 'gray',
                        })
                        ->badge(),
                ])->space(2),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'reviewing' => 'Reviewing',
                        'published' => 'Published',
                    ]),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    Action::make('activities')
                        ->url(fn ($record) => PortfolioResource::getUrl('activities', ['record' => $record]))
                        ->icon(Heroicon::OutlinedClock),
                    ActionGroup::make([
                        DeleteAction::make(),
                    ])->dropdown(false),
                ]),
            ], position: RecordActionsPosition::BeforeColumns)
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
