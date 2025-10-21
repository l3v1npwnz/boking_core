<?php

declare(strict_types=1);

namespace App\Actions\HunterBooking;

use App\Http\Requests\HunterBooking\Dto\BookingDto;
use App\Models\HuntingBooking;

final class ConfirmHuntingBookingAction
{
    public function handle(BookingDto $dto): bool
    {
        $booking = HuntingBooking::query()
            ->create([
                'guide_id' => $dto->getGuideId(),
                'tour_name' => $dto->getTourName(),
                'hunter_name' => $dto->getHunterName(),
                'date' => $dto->getBookingDate(),
                'participants_count' => $dto->getParticipantsCount(),
            ]);

        $dto->setHuntingBooking($booking);

        return true;
    }
}
