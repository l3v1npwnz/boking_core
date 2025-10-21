<?php

declare(strict_types=1);

namespace App\Actions\Guide;

use App\Models\Guide;
use Illuminate\Pagination\CursorPaginator;

final readonly class ShowActiveGuideAction
{
    public function __invoke(): CursorPaginator
    {
        return Guide::query()
            ->where('is_active', true)
            ->cursorPaginate();
    }
}
