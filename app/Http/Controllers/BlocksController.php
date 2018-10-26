<?php

namespace App\Http\Controllers;


use App\Blocks;
use App\Http\Resources\BlockResource as BlockResource; 
use Illuminate\Http\Request;
use App\Http\Requests;

class BlocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Blocks::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $block= $request->isMethod('put') ? Blocks::findOrFail($request->block_id): new Blocks; 

        // $block= new Blocks;
        //$block->block_id= $request->input('block_id');
        $block->block_type= $request->input('block_type');
        $block->status= $request->input('status');

        if($block->save()){
             return new BlockResource($block); 
        } 

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Blocks::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $block;
    }

  


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $block = Blocks::findOrFail($id);

        $block->status = '3';

        if ($block->save()){
            return response()->json([
                 'message' => 'Block has been deleted']);
         }   
    }
}
