<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\v1\Guide;

use App\Actions\Guide\ShowActiveGuideAction;
use App\Http\Resources\Api\Guide\ActiveGuideResource;
use Illuminate\Http\JsonResponse;

final class GuideController
{
    public function index(ShowActiveGuideAction $action): JsonResponse
    {
        return ActiveGuideResource::collection($action())->response();
    }
}
