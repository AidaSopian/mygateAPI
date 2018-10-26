<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Unit extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'unit_id' => $this -> unit_id,
            'block_id' => $this -> block_id,
            'unit_no' => $this -> unit_no,
            'status' => $this -> status,
            'floor_no' => $this -> floor_no
        ];
    }
}
