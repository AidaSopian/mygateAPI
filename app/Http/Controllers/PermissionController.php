<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Permission;
use App\Http\Resources\Permission as PermissionResource;

class PermissionController extends Controller
{
        public function create(Request $request)
        {
            //update or edit
            $permission = $request->isMethod('put') ? Permission::findOrFail($request->permission_id) : new Permission;
    
            $permission->staff_id = $request->input('staff_id');
            $permission->details = $request->input('details');
            $permission->created_at = $request->input('created_at');
            $permission->updated_at = $request->input('updated_at');
            
            if($permission->save()) {
    
                return new PermissionResource($permission);
            }
        }
    
        public function show(Request $request)
        {
            $permission = $request->get('permission_id');
            //show unit and blocks table 
           
            return DB::table('permission','staff_management', 'unit_user', 'units')
            ->join('staff_management', 'staff_management.staff_id', '=', 'permission.staff_id')
            ->join('unit_user', 'unit_user.unit_user_id', '=', 'staff_management.unit_user_id')
            ->join('units', 'units.unit_id', '=', 'unit_user.unit_id')
            ->join('blocks', 'blocks.block_id', '=', 'units.block_id')
            ->where('permission.permission_id', $permission)
            ->select('permission.*', 'staff_management.*', 'unit_user.*', 'units.*', 'blocks.*')
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
