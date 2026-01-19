<?php

namespace App\Filament\Widgets;

use App\Models\CateringRequest;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class UpcomingEventsWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Upcoming Confirmed Events';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                CateringRequest::query()
                    ->where('status', 'confirmed')
                    ->where('event_date', '>=', now()->toDateString())
                    ->orderBy('event_date')
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('event_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->time('g:i A'),
                Tables\Columns\TextColumn::make('contact_name')
                    ->label('Contact'),
                Tables\Columns\TextColumn::make('venue_name')
                    ->label('Venue'),
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
                    ->label('Guests'),
            ])
            ->paginated(false);
    }
}
