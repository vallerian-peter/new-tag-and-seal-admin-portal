<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Components\Utilities\Get;
use App\Enums\UserTypeEnum;
use App\Models\SystemUser;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class UserForm
{
    public static function configure(Schema $schema, bool $isEdit = false): Schema
    {
        return $schema
            ->components([
                Section::make('User Authentication (Users Table)')
                    ->schema([
                        Select::make('profile')
                            ->disabled()
                            ->required()
                            ->options(UserTypeEnum::class)
                            ->default(UserTypeEnum::SYSTEMUSER),
                        TextInput::make('username')
                            ->label('Username')
                            ->placeholder('Enter username')
                            ->required()
                            ->maxLength(255)
                            ->helperText('This will be used for login'),
                        TextInput::make('password')
                            ->label('Password')
                            ->placeholder($isEdit ? 'Enter new password (leave blank to keep current)' : 'Enter password')
                            ->helperText($isEdit ? 'Password must be at least 8 characters long. Leave blank to keep current password.' : 'Password must be at least 8 characters long')
                            ->required(!$isEdit)
                            ->minLength(8)
                            ->password()
                            ->revealable()
                            ->hidden($isEdit) // Hide password field in edit mode
                            ->columnSpanFull(),
                    ])
                    ->columns($isEdit ? 1 : 2),

                Section::make('System User Details')
                    ->schema([
                        TextInput::make('name')
                            ->label('Full Name')
                            ->placeholder('Enter full name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label('Email')
                            ->placeholder('Enter email address')
                            ->required()
                            ->email()
                            ->maxLength(255)
                            ->helperText('This will be used as username if not specified above')
                            ->live()
                            ->afterStateUpdated(function (Set $set, $state, $get) {
                                // Auto-fill username with email if username is empty
                                if (empty($get('username'))) {
                                    $set('username', $state);
                                }
                            }),
                        TextInput::make('phone')
                            ->label('Phone Number')
                            ->placeholder('Enter phone number')
                            ->tel()
                            ->maxLength(20),
                        TextInput::make('address')
                            ->label('Address')
                            ->placeholder('Enter address')
                            ->maxLength(500),
                    ])
                    ->columns(2),

                Section::make('System Settings')
                    ->schema([
                        Select::make('status_id')
                            ->relationship('status', 'name')
                            ->default('Active')
                            ->required(),
                        Select::make('state_id')
                            ->relationship('state', 'name')
                            ->default('Active')
                            ->required(),
                        TextInput::make('created_by')
                            ->hidden()
                            ->default(auth()->user()->id),
                        TextInput::make('updated_by')
                            ->hidden()
                            ->default(auth()->user()->id),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
            ]);
    }
}
