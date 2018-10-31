<?php

namespace App\Http\Controllers;

use App\Unit_user;
use App\Http\Resources\Unit_user as Unit_userResources;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;

class Unit_userController extends Controller
{
    //show
    public function show ($unit_user_id)
    {
        return Unit_user::find ($unit_user_id);
    }

    //create and update
    public function store(Request $request)
    {
        $unitUser= $request->isMethod('put') ? Unit_user::findOrFail($request->unit_user_id):new Unit_user;

       
       $unitUser->user_id= $request->input('user_id');
       $unitUser->s_id= $request->input('s_id');
       $unitUser->permission_id= $request->input('permission_id');
       $unitUser->unit_id= $request->input('unit_id');
       $unitUser->time_in= $request->input('time_in');
       $unitUser->time_out= $request->input('time_out');
       $unitUser->status= $request->input('status');
      
        if($unitUser->save()) {
            return new Unit_userResources($unitUser);
        }
    }


    //delete 
    public function delete(Request $request, $unit_user_id)
    {
        $unitUser = Unit_user::findOrFail($unit_user_id);

        $unitUser->status ='3';

        if($unitUser->save())
        {
            return response()->json([
                'message'=>'Unit user has been deleted'
            ]);
        }
        
    }

  
}
