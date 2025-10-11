<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('greeting_text')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('bio')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image_path')
                    ->image()
                    ->disk('public')
                    ->visibility('public')
                    ->directory('profiles')
                    ->required(),
                TextInput::make('linkedin_url')
                    ->url()
                    ->required(),
                TextInput::make('github_url')
                    ->url()
                    ->required(),
                FileUpload::make('resume_path')
                    ->acceptedFileTypes(['application/pdf'])
                    ->disk('public')
                    ->visibility('public')
                    ->directory('profiles')
                    ->required(),
            ]);
    }
}
