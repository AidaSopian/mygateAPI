<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Parking;
use App\Http\Resources\Parking as ParkingResource;

class ParkingController extends Controller
{
    public function create(Request $request)
    {
        //update or edit
        $parking = $request->isMethod('put') ? Parking::findOrFail($request->p_id) : new Parking;

        $parking->s_id = $request->input('s_id');
        $parking->user_id = $request->input('user_id');
        $parking->unit_id = $request->input('unit_id');
        $parking->parking_slot = $request->input('parking_slot');
        
        if($parking->save()) {

            return new ParkingResource($parking);
        }
    }

    public function show(Request $request)
    {
        $parking = $request->get('p_id');
        //show unit and blocks table 
       
        return DB::table('parking_lot', 'units', 'entry')
        ->join('society', 'society.s_id', '=', 'parking_lot.s_id')
        ->join('users', 'users.user_id', '=', 'parking_lot.user_id')
        ->join('units', 'units.unit_id', '=', 'parking_lot.unit_id')
        ->join('blocks', 'units.block_id', '=', 'blocks.block_id')
        ->where('parking_lot.p_id', $parking)
        ->select('parking_lot.*', 'society.*', 'entry', 'units.*', 'blocks.*')
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
