<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Society extends JsonResource
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
           's_id' => $this->s_id,
           'name' => $this->name,
           'ic_no' => $this->ic_no,
           'no_phone' => $this->no_phone,
           'address' => $this->address,
           'plate_no' => $this->plate_no,
           'type_vehicles' => $this->type_vehicles,
           'status' => $this->status
       ];
    }
}
