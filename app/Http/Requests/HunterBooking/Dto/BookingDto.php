<?php

declare(strict_types=1);

namespace App\Http\Requests\HunterBooking\Dto;

use App\Models\HuntingBooking;
use Carbon\CarbonImmutable;

final class BookingDto
{
    public function __construct(
        private readonly string $guideId,
        private readonly string $tourName,
        private readonly string $hunterName,
        private readonly CarbonImmutable $bookingDate,
        private readonly int $participantsCount,
        private ?HuntingBooking $huntingBooking = null,
    ) {

    }

    public function getGuideId(): string
    {
        return $this->guideId;
    }

    public function getTourName(): string
    {
        return $this->tourName;
    }

    public function getHunterName(): string
    {
        return $this->hunterName;
    }

    public function getBookingDate(): CarbonImmutable
    {
        return $this->bookingDate;
    }

    public function getParticipantsCount(): int
    {
        return $this->participantsCount;
    }

    public function setHuntingBooking(HuntingBooking $huntingBooking): BookingDto
    {
        $this->huntingBooking = $huntingBooking;
        return $this;
    }

    public function getHuntingBooking(): ?HuntingBooking
    {
        return $this->huntingBooking;
    }
}
