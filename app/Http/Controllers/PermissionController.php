<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Http\Resources\Permission as PermissionResource;
use Session;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    //push
    public function create(Request $request)
    {
        ///update or edit
        $permission = $request->isMethod('put') ? Permission::findOrFail($request->permission_id) : new Permission;

        $permission->staff_id = $request->input('staff_id');
        $permission->details = $request->input('details');
        $permission->created_at = $request->input('created_at');
        $permission->updated_at = $request->input('updated_at');
        $permission->status = $request->input('status');

        if($permission->save()) {

            return new PermissionResource($permission);
        }
    }
    

    public function show(Request $request)
    {
        $permission = $request->get('staff_id');
        //show unit and blocks table 
       
        return DB::table('permission')
        ->join('staff_management', 'permission.staff_id', '=', 'staff_management.staff_id')
      //  ->where('permissions.staff_id', $permission)
        ->get();
   
    }
    

    public function destroy($id)
    {

        $permission = Permission::findOrFail($id);

        $permission->status ='3';

        if($permission->save())
        {
            return response()->json([
                'message'=>'Permission has been deleted'
            ]);
        }
        
    }
}
