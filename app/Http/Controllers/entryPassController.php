<?php

namespace App\Http\Controllers;

use App\entryPass;
use App\Http\Resources\entryPassResource as entryPassResource;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class entryPassController extends Controller
{
    //this is comment
   public function store(Request $request)
    {
        $entryPass = $request->isMethod('put') ? entryPass::
        findOrFail($request->entryPass_id):new entryPass;

        $entryPass->unit_user_id= $request->input('unit_user_id');
        $entryPass->unit_id=$request->input('unit_id');
        $entryPass->status=$request->input('status');

        if($entryPass->save()){
            return new entryPassResource($entryPass);
        }
    }

    public function show($entryPass_id)
    {
        return entryPass::find($entryPass_id);
    }

    //search table entry
    public function find()
    {
        $entryPass=DB::table('entry')
        //join table unit with entry
        ->join('units', 'units.unit_id', '=', 'entry.unit_id')
        //join table unit user with entry
        ->join ('unit_user', 'unit_user.unit_user_id', '=',
        'entry.unit_user_id')

        ->get();

        print_r($entryPass);

    } 

    public function destroy($entryPass_id)
    {
        $entryPass = entryPass::findOrFail($entryPass_id);   

        $entryPass->status = '3';

        if($entryPass->save())
        {
            return response()->json([
                'message' => 'Entry pass has been deleted'
            ]);
        }
    }
}
