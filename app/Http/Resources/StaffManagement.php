<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StaffManagement extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'staff_id'=> $this->staff_id,
            'unit_user_id'=> $this->unit_user_id,
            'name'=> $this->name,
            'email'=> $this->email,
            'password'=> $this->password,
            'status'=> $this->status,
            //
        ];
    }
}
