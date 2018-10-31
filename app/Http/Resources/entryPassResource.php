<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class entryPassResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'entryPass_id'=>$this->entryPass_id,
            'unit_user_id'=>$this->unit_user_id,
            'unit_id'=>$this->unit_id,
            'status'=>$this->status
        ];
    }
}
