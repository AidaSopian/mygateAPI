<?php

namespace App\Http\Controllers;


use App\Society;
use App\Http\Resources\Society as SocietyResource;
use Illuminate\Http\Request;
use App\Http\Requests;


class SocietyController extends Controller
{
       public function show($s_id)
    {
        return Society::find($s_id);
    }

    public function store(Request $request)
    {
        $society = $request -> isMethod('put') ? Society::findOrFail($request->s_id) : new Society;

      //  $society->s_id = $request->input('s_id');
        $society->name = $request->input('name');
        $society->ic_no = $request->input('ic_no');
        $society->no_phone = $request->input('no_phone');
        $society->address = $request->input('address');
        $society->plate_no = $request->input('plate_no');
        $society->type_vehicles = $request->input('type_vehicles');
        $society->status = $request->input('status');
        
        if($society->save()){
            return new SocietyResource($society);
        }
    }

    public function destroy($s_id)
    {
        $society = Society::findOrFail($s_id);

        $society->status ='3';

        if($society->save())
        {
            return response()->json([
                'message'=>'Society has been deleted'
            ]);
        }
        
    }

}
