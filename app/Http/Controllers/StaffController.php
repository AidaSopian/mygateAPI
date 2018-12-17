<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Staff;
use App\Http\Resources\Staff as StaffResource;

class StaffController extends Controller
{
    public function show($staff_id)
    {
        return Staff::find($staff_id);
    }

    public function create(Request $request)
    {
        //update or edit
        $staff = $request->isMethod('put') ? Staff::findOrFail($request->staff_id) : new Staff;

        $staff->unit_user_id = $request->input('unit_user_id');
        $staff->name = $request->input('name');
        $staff->email = $request->input('email');
        $staff->password = $request->input('password');
        $staff->status = $request->input('status');
        
        if($staff->save()) {

            return new StaffResource($staff);
        }
    }

    public function query(Request $request)
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
        
    }

    public function destroy($staff_id)
    {
        $staff = Staff::findOrFail($staff_id);   

        $staff->status = '3';

        if($staff->save())
        {
            return response()->json([
                'message' => 'Staff has been deleted'
            ]);
        }
    }


}
