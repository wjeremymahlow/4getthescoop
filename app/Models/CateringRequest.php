<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CateringRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_date',
        'start_time',
        'end_time',
        'estimated_guests',
        'venue_name',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'zip_code',
        'contact_name',
        'contact_email',
        'contact_phone',
        'event_type',
        'special_requests',
        'status',
        'admin_notes',
        'quoted_price',
    ];

    protected function casts(): array
    {
        return [
            'event_date' => 'date',
            'start_time' => 'datetime:H:i',
            'end_time' => 'datetime:H:i',
            'quoted_price' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed(Builder $query): Builder
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeUpcoming(Builder $query): Builder
    {
        return $query->where('event_date', '>=', now()->toDateString());
    }

    public function scopeThisMonth(Builder $query): Builder
    {
        return $query->whereMonth('event_date', now()->month)
            ->whereYear('event_date', now()->year);
    }

    public function getFullAddressAttribute(): string
    {
        $address = $this->address_line_1;
        if ($this->address_line_2) {
            $address .= ', ' . $this->address_line_2;
        }
        $address .= ', ' . $this->city . ', ' . $this->state . ' ' . $this->zip_code;
        return $address;
    }

    public function getEventTypeLabelAttribute(): string
    {
        return match ($this->event_type) {
            'birthday_party' => 'Birthday Party',
            'corporate_event' => 'Corporate Event',
            'wedding' => 'Wedding',
            'school_event' => 'School Event',
            'community_event' => 'Community Event',
            'private_party' => 'Private Party',
            'other' => 'Other',
            default => $this->event_type,
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'Pending',
            'reviewed' => 'Reviewed',
            'confirmed' => 'Confirmed',
            'declined' => 'Declined',
            'completed' => 'Completed',
            'cancelled' => 'Cancelled',
            default => $this->status,
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'warning',
            'reviewed' => 'info',
            'confirmed' => 'success',
            'declined' => 'danger',
            'completed' => 'gray',
            'cancelled' => 'danger',
            default => 'gray',
        };
    }
}
