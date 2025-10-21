<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\Guide;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActiveGuideResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->resource->name,
            'experience_years' => $this->resource->experience_years,
        ];
    }
}
