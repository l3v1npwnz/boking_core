<?php

declare(strict_types=1);

namespace App\Actions\HunterBooking;

use App\Http\Requests\HunterBooking\Dto\BookingDto;
use App\Models\Guide;
use Closure;

final class CheckBookingAvailableAction
{
    public function handle(BookingDto $dto, Closure $next): bool
    {
        $guide = Guide::query()
            ->where('id', $dto->getGuideId())
            ->first();

        $exists = $guide
            ->huntingTours()
            ->where('date', $dto->getBookingDate())
            ->lockForUpdate()
            ->exists();

        if ($exists) {
            return false;
        }

        return $next($dto);
    }
}
