<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('published_at')
                    ->native(false)
                    ->required(),
                FileUpload::make('image_path')
                    ->directory('posts')
                    ->disk('public')
                    ->visibility('public')
                    ->columnSpanFull()
                    ->image(),
                TextInput::make('title')
                    ->columnSpanFull()
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                MarkdownEditor::make('content')
                    ->fileAttachmentsDirectory('posts')
                    ->columnSpanFull(),
            ]);
    }
}
