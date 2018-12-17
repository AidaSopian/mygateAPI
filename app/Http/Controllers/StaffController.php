<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Staff;
use App\Http\Resources\Staff as StaffResource;

class StaffController extends Controller
{
    public function create(Request $request)
    {
        //update or edit
        $staff = $request->isMethod('put') ? Staff::findOrFail($request->staff_id) : new Staff;

        $staff->unit_user_id = $request->input('unit_user_id');
        $staff->status = $request->input('status');
        
        if($staff->save()) {

            return new StaffResource($staff);
        }
    }

    public function show(Request $request)
    {
        $staff = $request->get('staff_id');
        //show unit and blocks table 
       
        return DB::table('staff_management','unit_user', 'units', 'users, ')
        ->join('unit_user', 'unit_user.unit_user_id', '=', 'staff_management.unit_user_id')
        ->join('users', 'unit_user.user_id', '=', 'users.user_id')
        ->join('units', 'unit_user.unit_id', '=', 'units.unit_id')
        ->join('blocks', 'units.block_id', '=', 'blocks.block_id')
        ->where('staff_management.staff_id', $staff)
        ->select('staff_management.*', 'unit_user.*', 'users.*', 'units.*', 'blocks.*')
        ->get();
        

        //when data is deleted, this will show up 
        /*$unit = Unit::findOrFail($id);

        if ($unit->status == 3){
           return response()->json([
                'message' => 'Unit has been deleted']);
        }
        else{
            return new UnitResource($unit);
        }  */

    }
}
