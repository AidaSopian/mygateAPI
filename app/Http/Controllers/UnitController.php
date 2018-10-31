<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Unit;
use App\Http\Resources\Unit as UnitResource;
use Session;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Unit
        $units = Unit::paginate(15);
        return UnitResource::collection($units);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // update and create
    {
        $units = $request -> isMethod('put') ? Unit::findOrFail ($request -> unit_id) : new Unit;

        //$units -> unit_id = $request -> input ('unit_id');
        $units -> block_id = $request -> input ('block_id');
        $units -> unit_no = $request -> input ('unit_no');
        $units -> status = $request -> input ('status');
        $units -> floor_no= $request -> input ('floor_no');

        if ($units->save()) {

            return new UnitResource($units);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $units = $request->get('block_id');
        //show unit and blocks table 
       
        return DB::table('units')
        ->join('blocks', 'units.block_id', '=', 'blocks.block_id')
        ->where('units.block_id', $units)
        ->get();
        
    }
        
//when data is deleted, this will show up 
        /*$unit = Unit::findOrFail($id);

        if ($unit->status == 3){
           return response()->json([
                'message' => 'Unit has been deleted']);
        }
        else{
            return new UnitResource($unit);
        }  */

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $units = Unit::findOrFail($id);

        $units->status ='3';

        if($units->save())
        {
            return response()->json([
                'message'=>'Unit has been deleted'
            ]);
        }
        
    }

}


