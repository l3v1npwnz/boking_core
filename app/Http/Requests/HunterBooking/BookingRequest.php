<?php

declare(strict_types=1);

namespace App\Http\Requests\HunterBooking;

use App\Http\Requests\HunterBooking\Dto\BookingDto;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Http\FormRequest;

final class BookingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'guide_id' => [
                'required',
                'integer',
                'exists:guides,id',
            ],
            'tour_name' => [
                'required',
                'string',
            ],
            'hunter_name' => [
                'required',
                'string',
            ],
            'booking_date' => [
                'required',
                'date_format:Y-m-d',
            ],
            'participants_count' => [
                'required',
                'integer',
                'lte:'.config('hunter-booking.participants-count'),
            ],
        ];
    }

    public function getDto(): BookingDto
    {
        return new BookingDto(
            guideId: $this->validated('guide_id'),
            tourName: $this->validated('tour_name'),
            hunterName: $this->validated('hunter_name'),
            bookingDate: CarbonImmutable::parse($this->validated('booking_date')),
            participantsCount: (int) $this->validated('participants_count')
        );
    }
}
