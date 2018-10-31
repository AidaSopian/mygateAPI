<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaffManagement;
use App\Http\Resources\StaffManagement as StaffManagementResource; 
use App\Http\Requests;
use DB;

class StaffManagementController extends Controller
{
    //push this file
    public function show($staff_id)
    {
        return StaffManagement::find($staff_id);
    }

    public function query (Request $request)
    {
        //$staff_management = $request->get('unit_user_id');
        $staff_management = DB::table('staff_management')
        ->join('unit_user', 'staff_management.unit_user_id', '=', 'unit_user.unit_user_id')
        ->get();

        print_r($staff_management);
    }

    public function store(Request $request)
    {
        $staff_management = $request -> isMethod('put') ? StaffManagement::findOrFail($request->staff_id) : new StaffManagement;

      //$staff_management->staff_id = $request->input('staff_id');
        $staff_management->unit_user_id = $request->input('unit_user_id');
        $staff_management->name = $request->input('name');
        $staff_management->email = $request->input('email');
        $staff_management->password = $request->input('password');
        $staff_management->status = $request->input('status');
        
        if($staff_management->save()){
            return new StaffManagementResource($staff_management);
        }
    }

    public function destroy($staff_id)
    {
        $staff_management = StaffManagement::findOrFail($staff_id);

        $staff_management->status ='3';

        if($staff_management->save())
        {
            return response()->json([
                'message'=>'Staff Management has been deleted'
            ]);
        }
        
    }
}
