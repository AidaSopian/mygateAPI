<?php

namespace App\Http\Controllers;

use App\UnitUser;
use App\User;
use App\Http\Resources\UnitUser as UnitUserResource;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\Drivers;
use Response;
use DB;

class UnitUserController extends Controller
{
    public function show($unit_user_id)
    {
        return UnitUser::find($unit_user_id);
    }

    public function store(Request $request)
    {
        $unit_user = $request->isMethod('put') ? UnitUser::findOrFail($request->unit_user_id) : new UnitUser;
        
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

    public function delete($unit_user_id)
    {
        $unit_user = UnitUser::findOrFail($unit_user_id);

        $unit_user->status = "3";

        if($unit_user->save()){
            return response()->json([
                'message' => "Unit User has been deleted"
            ]);
        }
    }

    public function getSearchResults(Request $request) {
        
        if($data = $request->get('s_id')){
        return DB::table('unit_user')
        ->join(
            'society',
            'society.s_id', '=', 'unit_user.s_id'
        )
        ->where('unit_user.s_id', $data)
                        ->get();
        }
        elseif($data = $request->get('user_id')){
            return DB::table('unit_user')
            ->join(
                'users',
                'users.user_id','=','unit_user.user_id'
            )
            ->where('unit_user.user_id', $data)
                            ->get();
            }
            elseif($data = $request->get('unit_id')){
                return DB::table('units')
                ->join(
                    'unit_user',
                    'units.unit_id', '=', 'unit_user.unit_id'
                )
                ->join(
                    'blocks',
                    'blocks.block_id', '=', 'units.block_id'
                )
                ->where('units.unit_id', $data)
                ->select('unit_user.*', 'units.*','blocks.*')
                ->get();
            }
                elseif($data = $request->get('permission_id')){
                    return DB::table('permission')
                    ->join(
                        'unit_user',
                        'permission.permission_id', '=', 'unit_user.permission_id'
                    )
                    ->join(
                        'staff_management',
                        'staff_management.staff_id', '=', 'permission.staff_id'
                    )
                    ->where('permission.permission_id', $data)
                    ->select('unit_user.*', 'permission.*','staff_management.*')
                    ->get();
                
                }

    }

    public function query()
    {
        $unit_user = DB::table('unit_user', 'units', 'permission')
            ->join(
                'users',
                'users.user_id','=','unit_user.user_id'
            )
            ->join(
                'society',
                'society.s_id', '=', 'unit_user.s_id'
            )
            ->join(
                'units',
                'units.unit_id', '=', 'unit_user.unit_id'
            )
            ->join(
                'blocks',
                'blocks.block_id', '=', 'units.block_id'
            )
            ->join(
                'permission',
                'permission.permission_id', '=', 'unit_user.permission_id'
            )
            ->join(
                'staff_management',
                'staff_management.staff_id', '=', 'permission.staff_id'
            )
            ->get();
            
            print_r($unit_user);
   
    }

}
