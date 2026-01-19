<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'status',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    public function scopeAvailable(Builder $query): Builder
    {
        return $query->where('status', 'available');
    }

    public function scopeBlocked(Builder $query): Builder
    {
        return $query->where('status', 'blocked');
    }

    public function scopeBooked(Builder $query): Builder
    {
        return $query->where('status', 'booked');
    }

    public function scopeFuture(Builder $query): Builder
    {
        return $query->where('date', '>=', now()->toDateString());
    }

    public function isAvailable(): bool
    {
        return $this->status === 'available';
    }

    public function isBlocked(): bool
    {
        return $this->status === 'blocked';
    }

    public function isBooked(): bool
    {
        return $this->status === 'booked';
    }
}
