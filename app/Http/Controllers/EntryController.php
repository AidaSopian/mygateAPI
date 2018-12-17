<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Entry;
use App\Http\Resources\Entry as EntryResource;

class EntryController extends Controller
{
    public function create(Request $request)
    {
        //update or edit
        $entry = $request->isMethod('put') ? Entry::findOrFail($request->entryPass_id) : new Entry;

       // $unit->id = $request->input('unit_id');
        $entry->unit_user_id = $request->input('unit_user_id');
        $entry->unit_id = $request->input('unit_id');
        $entry->status = $request->input('status');
        
        if($entry->save()) {

            return new EntryResource($entry);
        }
    }

    public function show(Request $request)
    {
        $entry = $request->get('entryPass_id');
        //show unit and blocks table 
       
        return DB::table('entry', 'units')
        ->join('unit_user', 'unit_user.unit_user_id', '=', 'entry.unit_user_id')
        ->join('units', 'units.unit_id', '=', 'entry.unit_id')
        ->join('blocks', 'units.block_id', '=', 'blocks.block_id')
        ->where('entry.entryPass_id', $entry)
        ->select('entry.*', 'unit_user.*', 'units.*', 'blocks.*')
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
    
    
    public function destroy($entryPass_id)
    {

        $entry = Entry::findOrFail($entryPass_id);

        $entry->status = '3';

        if ($entry->save()){
            return response()->json([
                 'message' => 'Unit has been deleted']);
         }    
         
        
    }
}
