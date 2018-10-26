<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Unit;
use App\Http\Resources\Unit as UnitResource;
use Session;

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
    public function show($id)
    {
        $units = Unit::findOrFail($id);
        return new UnitResource($units);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $units = Unit::findOrFail($id);

        $units->delete;
        Session::flash('message');
        return new UnitResource($units);
        
    }


}


