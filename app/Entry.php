<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
        //model society
        public $table = "entry";
        public $timestamps = false;
        
        public $primaryKey = "entryPass_id";
        protected $fillable = ['unit_user_id','user_id','status'];
    
    
        /*protected $searchable = [
            'name'
        ];*/
    
    
    
}
