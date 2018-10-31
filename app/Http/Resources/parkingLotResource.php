<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class parkingLotResource extends JsonResource
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
            'p_id'=>$this->p_id,
            's_id'=>$this->s_id,
            'user_id'=>$this->user_id,
            'unit_id'=>$this->unit_id,
            'parking_slot'=>$this->parking_slot,
            'status'=>$this->status,
        ];
    }
}
