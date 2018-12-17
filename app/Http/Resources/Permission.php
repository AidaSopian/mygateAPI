<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Permission extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // push
        return [
            'permission_id' => $this->permission_id,
            'staff_id' => $this->staff_id,
            'details' => $this->details,
            'created_at'=>$this->created_at,
            'updated_at' => $this->updated_at
       ];
    }
}
