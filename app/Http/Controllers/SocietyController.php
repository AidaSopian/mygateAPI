<?php

namespace App\Http\Controllers;

use App\Society;
use App\Http\Resources\Society as SocietyResources;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Drivers;
use Response;
use DB;

class SocietyController extends Controller
{
    //show
    public function show ($s_id)
    {
        return Society::find ($s_id);
    }


    //create and update
    public function store(Request $request)
    {
        $society= $request->isMethod('put') ? Society::findOrFail($request->s_id):new Society;

       // $society->s_id= $request->input('s_id');
        $society->name= $request->input('name');
        $society->ic_no= $request->input('ic_no');
        $society->no_phone= $request->input('no_phone');
        $society->address= $request->input('address');
        $society->plate_no= $request->input('plate_no');
        $society->type_vehicles= $request->input('type_vehicles');
        $society->status= $request->input('status');
      
        if($society->save()) {
            return new SocietyResources($society);
        }
    }

  
    //delete
    public function delete(Request $request, $s_id)
    {
        $society = Society::findOrFail($society);

        $society->status ='3';

        if($society->save())
        {
            return response()->json([
                'message'=>'Society has been deleted'
            ]);
        }
        
    }

        
    public function getSearchResults(Request $request) {

        $data = $request->get('name');
        $drivers = DB::table('society')->where('name', 'like', "%{$data}%")
                        ->get();
        
        return Response::json([
            $drivers
]);
    }

}
