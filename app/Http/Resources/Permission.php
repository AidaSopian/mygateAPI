<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Permission extends JsonResource
{

    public function toArray($request)
    {
        // push
        return parent::toArray($request);
    }
}
