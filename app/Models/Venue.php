<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venue extends Model
{
    use HasFactory;

    public const STATUS_AVAILABLE = 'available';
    public const STATUS_BOOKED = 'booked';
    public const STATUS_MAINTENANCE = 'maintenance';

    protected $fillable = [
        'name',
        'location',
        'seat_capacity',
        'venue_type',
        'description',
        'photo',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'seat_capacity' => 'integer',
        ];
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', self::STATUS_AVAILABLE);
    }
}