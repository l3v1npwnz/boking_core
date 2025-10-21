<?php

declare(strict_types=1);

namespace App\Actions\HunterBooking;

use App\Actions\ActionGroup\ActionGroup;

final class HunterBookingActionsGroup extends ActionGroup
{
    protected $pipes = [
        CheckBookingAvailableAction::class,
        ConfirmHuntingBookingAction::class
    ];
}
