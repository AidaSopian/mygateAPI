<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UnitUser extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
       return [
            'unit_user_id' => $this->unit_user_id,
            'user_id' => $this->user_id,
            's_id' => $this->s_id,
            'unit_id' => $this->unit_id,
            //'date' => $this->date,
            'time_in' => $this->time_in,
            'time_out' => $this->time_out,
            'status' => $this->status
       ];
    }
}
