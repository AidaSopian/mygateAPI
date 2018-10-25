<?php

namespace App\Http\Controllers;

use App\UnitUser;
use App\Http\Resources\UnitUser as UnitUserResource;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;

class UnitUserController extends Controller
{
    public function show($unit_user_id)
    {
        return UnitUser::find($unit_user_id);
    }

    public function store(Request $request)
    {
        $unit_user = $request->isMethod('put') ? UnitUser::findOrFail($request->$unit_user_id) : new UnitUser;
        
        //$unit_user->unit_user_id = $request->input('unit_user_id');
        $unit_user->user_id = $request->input('user_id');
        $unit_user->s_id = $request->input('s_id');
        $unit_user->permission_id = $request->input('permission_id');
        $unit_user->unit_id = $request->input('unit_id');
        $unit_user->time_in = $request->input('time_in');
        $unit_user->time_out = $request->input('time_out');
        $unit_user->status = $request->input('status');

        if($unit_user->save())
        {
            return new UnitUserResource($unit_user);
        }
    }

    public function delete(Request $request, $unit_user_id)
    {
        $unit_user = UnitUser::findOrFail($unit_user_id);

        $unit_user->status = "3";

        if($unit_user->save()){
            return response()->json([
                'message' => "Unit User has been deleted"
            ]);
        }
    }
}
