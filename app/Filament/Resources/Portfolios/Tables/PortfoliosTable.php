<?php

namespace App\Filament\Resources\Portfolios\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PortfoliosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('status')
                    ->icon(fn ($record) => match ($record->status) {
                        'draft' => 'heroicon-o-pencil',
                        'archived' => 'heroicon-o-archive-box',
                        'on_progress' => 'heroicon-o-clock',
                        default => null,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'on_progress' => 'warning',
                        'draft' => 'primary',
                        'archived' => 'danger',
                        default => 'gray',
                    })
                    ->sortable()
                    ->searchable(),
                TextColumn::make('title')
                    ->searchable(),
                ImageColumn::make('image_path')
                    ->disk('public')
                    ->label('Thumbnail'),
                TextColumn::make('project_url')
                    ->url(fn ($record) => $record->project_url, true)
                    ->color('primary')
                    ->searchable(),
                TextColumn::make('github_url')
                    ->url(fn ($record) => $record->github_url, true)
                    ->color('primary')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                    ActionGroup::make([
                        ViewAction::make(),
                        EditAction::make(),
                    ])->dropdown(false),
                    ActionGroup::make([
                        DeleteAction::make(),
                    ])->dropdown(false),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
