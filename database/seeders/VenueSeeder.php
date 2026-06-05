<?php

namespace Database\Seeders;

use App\Models\Venue;
use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    public function run(): void
    {
        $venues = [
            [
                'name' => 'Main Auditorium',
                'location' => 'Kulliyyah of Engineering',
                'seat_capacity' => 500,
                'venue_type' => 'Auditorium',
                'description' => 'Large auditorium suitable for major talks, annual meetings, and faculty-level programs.',
                'photo' => 'venues/main-auditorium.jpg',
                'status' => Venue::STATUS_AVAILABLE,
            ],
            [
                'name' => 'Mini Theatre',
                'location' => 'Kulliyyah of ICT',
                'seat_capacity' => 150,
                'venue_type' => 'Theatre',
                'description' => 'Medium-sized theatre suitable for seminars, workshops, and student presentations.',
                'photo' => 'venues/mini-theatre.jpg',
                'status' => Venue::STATUS_MAINTENANCE,
            ],
            [
                'name' => 'Lecture Room 4',
                'location' => 'Kulliyyah of Economics',
                'seat_capacity' => 80,
                'venue_type' => 'Classroom',
                'description' => 'Standard lecture room with projector support for classes, briefings, and small discussions.',
                'photo' => 'venues/lecture-room-4.jpg',
                'status' => Venue::STATUS_AVAILABLE,
            ],
            [
                'name' => 'Conference Room',
                'location' => 'KENMS',
                'seat_capacity' => 40,
                'venue_type' => 'Meeting Room',
                'description' => 'Formal meeting room for committee sessions, interviews, and focused group discussions.',
                'photo' => 'venues/conference-room.jpg',
                'status' => Venue::STATUS_AVAILABLE,
            ],
            [
                'name' => 'Main Hall',
                'location' => 'Cultural Activity Centre (CAC)',
                'seat_capacity' => 2000,
                'venue_type' => 'Hall',
                'description' => 'High-capacity event hall suitable for festivals, convocation-scale gatherings, and exhibitions.',
                'photo' => 'venues/main-hall.jpg',
                'status' => Venue::STATUS_BOOKED,
            ],
        ];

        foreach ($venues as $venue) {
            Venue::updateOrCreate(
                ['name' => $venue['name']],
                $venue
            );
        }
    }
}