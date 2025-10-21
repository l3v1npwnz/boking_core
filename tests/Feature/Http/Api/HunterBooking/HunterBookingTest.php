<?php

namespace Http\Api\HunterBooking;

use App\Models\Guide;
use Tests\TestCase;

class HunterBookingTest extends TestCase
{
    public function test_can_booking_to_free_date(): void
    {
        $guide = Guide::factory(10)
            ->create()
            ->where('is_active', true)
            ->first();

        $response = $this->postJson(route('bookings.booking', [
            'guide_id' => $guide->id,
            'tour_name' => 'Bear hunter',
            'hunter_name' => 'Vasia Vlaznii',
            'booking_date' => now()->addDay()->format('Y-m-d'),
            'participants_count' => 9
        ]));

        $response->assertStatus(201);
    }

    public function test_cant_booking_to_booked_date(): void
    {
        $guide = Guide::factory(10)
            ->create()
            ->where('is_active', true)
            ->first();

        $response = $this->postJson(route('bookings.booking', [
            'guide_id' => $guide->id,
            'tour_name' => 'Bear hunter',
            'hunter_name' => 'Vasia Vlaznii',
            'booking_date' => now()->addDay()->format('Y-m-d'),
            'participants_count' => 9
        ]));

        $response->assertStatus(201);

        $response = $this->postJson(route('bookings.booking', [
            'guide_id' => $guide->id,
            'tour_name' => 'Bear hunter',
            'hunter_name' => 'Vasia Vlaznii',
            'booking_date' => now()->addDay()->format('Y-m-d'),
            'participants_count' => 9
        ]));

        $response->assertStatus(400);
    }

    public function test_cant_booking_with_greater_ten_participants(): void
    {
        $guide = Guide::factory(10)
            ->create()
            ->where('is_active', true)
            ->first();

        $response = $this->postJson(route('bookings.booking', [
            'guide_id' => $guide->id,
            'tour_name' => 'Bear hunter',
            'hunter_name' => 'Vasia Vlaznii',
            'booking_date' => now()->addDay()->format('Y-m-d'),
            'participants_count' => 12
        ]));

        $response->assertStatus(422);
    }
}
