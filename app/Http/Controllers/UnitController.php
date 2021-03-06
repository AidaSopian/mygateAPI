<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     *///
    public function index()
    {
        //$unit = Unit::paginate(5);
        $unit = Unit::all();

        $units = $unit->filter(function ($value, $key) {
            return $value->status < 3;
        });

        return new UnitResource($units);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //update or edit
        $unit = $request->isMethod('put') ? Unit::findOrFail($request->unit_id) : new Unit;

       // $unit->id = $request->input('unit_id');
       $unit->id = $request->input('user_id');
        $unit->block_id = $request->input('block_id');
        $unit->unit_no = $request->input('unit_no');
        $unit->status = $request->input('status');
        $unit->floor_no = $request->input('floor_no');
        
        if($unit->save()) {

            return new UnitResource($unit);
        }
    }
    
    

    //show data in table unit,block and profile by id
    public function show($unit_id)
    {
        
        return Unit::find($unit_id);

        return DB::table('units','profile')
        ->join('blocks', 'units.block_id', '=', 'blocks.block_id')
        ->join('profile','units.id', '=', 'profile.id')
        //->where('units.block_id', $unit)
        ->get();
        print_r($unit);
    
    }
    
  
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $unit = Unit::findOrFail($id);

        $unit->status = '3';

        if ($unit->save()){
            return response()->json([
                 'message' => 'Unit has been deleted']);
         }    
         
        
    }
}
