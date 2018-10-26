<?php

namespace App\Http\Controllers;


use App\Society;
use App\Http\Resources\Society as SocietyResource;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\DB;
//use App\Profile;
use Auth;

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

    public function delete($s_id)
    {
         
         $society = Society::findOrFail($s_id);

         $society->status = "3";

         if($society->save()){
             return response()->json([
                 'message' => "Society has been deleted"
             ]);
         }        
    }

    /*public function search(Request $request)
    {
        $name=Auth::user()->$name;
        //$profile=Profile::find($name);
        $keyword=$request->input('search');
        $posts=Post::where('Society','LIKE','%'.$keyword.'%')->get();
        return view('posts.societycontroller',['posts'=>$post]);
        //exit();
    }*/

    public function Search(Request $request){
        $name=$request->get('name');
        //return $query->where('society','LIKE','%' .$name. '%');
        $posts=DB::table('posts')->where('society','LIKE','%' .$name. '%');
        return view('index',['posts'=>$posts]);
    }

    public function index()
    {
        $posts=DB::table('posts')->paginate(15);
        return view('index',['posts'=>$posts]);
    }

}
