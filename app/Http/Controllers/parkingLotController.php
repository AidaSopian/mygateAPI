<?php

namespace App\Http\Controllers;

use App\parkingLot;
use App\Http\Resources\parkingLotResource as parkingLotResource;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class parkingLotController extends Controller
{
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  //
        $parkingLot = $request ->isMethod('put') ? parkingLot::findOrFail($request->p_id) : new parkingLot;

        $parkingLot->s_id = $request->input('s_id');
        $parkingLot->user_id= $request->input('user_id');
        $parkingLot->unit_id = $request->input('unit_id');
        $parkingLot->parking_slot = $request->input('parking_slot');
        $parkingLot->status = $request->input('status');

        if($parkingLot->save()){
            return new parkingLotResource($parkingLot);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($p_id)
    {
        return parkingLot:: find ($p_id);
    }

    public function query()
    {
        $parkingLot= DB::table('parking_lot')
        ->join ('society', 'society.s_id', '=', 'parking_lot.s_id' )

        ->join ('users', 'users.user_id', '=', 'parking_lot.user_id')

        ->join ('units', 'units.unit_id', '=', 'parking_lot.unit_id')

        ->get();

        print_r($parkingLot);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($p_id)
    {
        $parkingLot = parkingLot::findOrFail($p_id);

        $parkingLot->status ='3';

        if($parkingLot->save())
        {
            return response()->json([
                'message'=>'Parking Lot has been deleted'
            ]);
        }
    }




}
