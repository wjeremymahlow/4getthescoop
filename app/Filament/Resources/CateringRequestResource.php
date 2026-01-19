<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CateringRequestResource\Pages;
use App\Models\CateringRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CateringRequestResource extends Resource
{
    protected static ?string $model = CateringRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'Catering';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Event Details')
                    ->schema([
                        Forms\Components\DatePicker::make('event_date')
                            ->required(),
                        Forms\Components\TimePicker::make('start_time')
                            ->required(),
                        Forms\Components\TimePicker::make('end_time')
                            ->required(),
                        Forms\Components\TextInput::make('estimated_guests')
                            ->numeric()
                            ->required(),
                        Forms\Components\Select::make('event_type')
                            ->options([
                                'birthday_party' => 'Birthday Party',
                                'corporate_event' => 'Corporate Event',
                                'wedding' => 'Wedding',
                                'school_event' => 'School Event',
                                'community_event' => 'Community Event',
                                'private_party' => 'Private Party',
                                'other' => 'Other',
                            ])
                            ->required(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Location')
                    ->schema([
                        Forms\Components\TextInput::make('venue_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('address_line_1')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('address_line_2')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('city')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('state')
                            ->required()
                            ->maxLength(2)
                            ->default('TN'),
                        Forms\Components\TextInput::make('zip_code')
                            ->required()
                            ->maxLength(10),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Contact Information')
                    ->schema([
                        Forms\Components\TextInput::make('contact_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contact_email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contact_phone')
                            ->tel()
                            ->required()
                            ->maxLength(20),
                    ])
                    ->columns(3),

                Forms\Components\Section::make('Additional Information')
                    ->schema([
                        Forms\Components\Textarea::make('special_requests')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Admin')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'reviewed' => 'Reviewed',
                                'confirmed' => 'Confirmed',
                                'declined' => 'Declined',
                                'completed' => 'Completed',
                                'cancelled' => 'Cancelled',
                            ])
                            ->required()
                            ->default('pending'),
                        Forms\Components\TextInput::make('quoted_price')
                            ->numeric()
                            ->prefix('$'),
                        Forms\Components\Textarea::make('admin_notes')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('event_type')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'birthday_party' => 'Birthday Party',
                        'corporate_event' => 'Corporate Event',
                        'wedding' => 'Wedding',
                        'school_event' => 'School Event',
                        'community_event' => 'Community Event',
                        'private_party' => 'Private Party',
                        'other' => 'Other',
                        default => $state,
                    }),
                Tables\Columns\TextColumn::make('estimated_guests')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'reviewed' => 'info',
                        'confirmed' => 'success',
                        'declined' => 'danger',
                        'completed' => 'gray',
                        'cancelled' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('quoted_price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'reviewed' => 'Reviewed',
                        'confirmed' => 'Confirmed',
                        'declined' => 'Declined',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
                Tables\Filters\SelectFilter::make('event_type')
                    ->options([
                        'birthday_party' => 'Birthday Party',
                        'corporate_event' => 'Corporate Event',
                        'wedding' => 'Wedding',
                        'school_event' => 'School Event',
                        'community_event' => 'Community Event',
                        'private_party' => 'Private Party',
                        'other' => 'Other',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCateringRequests::route('/'),
            'create' => Pages\CreateCateringRequest::route('/create'),
            'edit' => Pages\EditCateringRequest::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }
}
