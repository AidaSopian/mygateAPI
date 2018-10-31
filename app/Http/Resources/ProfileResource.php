<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'id'=>$this->id,
            'user_id'=>$this->user_id,
            'name'=>$this->name,
            'phone'=> $this->phone,
            'address'=>$this->address,
            'zip'=>$this->zip,
            'city'=>$this->city,
            'state'=>$this->state,
            'country'=>$this->country,
            'status'=>$this->status
<<<<<<< HEAD



=======
            //
>>>>>>> 3f827da712ca022103068000d97799ee0ae39697
        ];
    }
}
