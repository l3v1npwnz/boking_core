<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\v1\HunterBooking;

use App\Actions\HunterBooking\HunterBookingActionsGroup;
use App\Http\Requests\HunterBooking\BookingRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Throwable;

final class HunterBookingController
{
    /**
     * @throws Throwable
     */
    public function bookings(BookingRequest $request, HunterBookingActionsGroup $group): JsonResponse
    {
        $booking = DB::transaction(static function () use ($request, $group) {
            return $group
                ->send($request->getDto())
                ->thenReturn();
        });

        if (! $booking) {
            return response()->json(status: Response::HTTP_BAD_REQUEST);
        }

        return response()->json(status: Response::HTTP_CREATED);
    }
}
