<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Http\Resources\ProfileResource as ProfileResource;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = $request ->isMethod('put') ? Profile::findOrFail($request->id) : new Profile;

        $profile->user_id = $request->input('user_id');
        $profile->name = $request->input('name');
        $profile->phone = $request->input('phone');
        $profile->address = $request->input('address');
        $profile->zip = $request->input('zip');
        $profile->city = $request->input('city');
        $profile->state = $request->input('state');
        $profile->country = $request->input('country');
        $profile->status = $request->input('status');

        if($profile->save()){
            return new ProfileResource($profile);
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
        return Profile:: find ($id);
    }

    //show user profile
    public function query (Request $request)
    {
        //$profile = $request->get('user_id');

        $profile = DB::table('profile')
        ->join('users', 'users.user_id', '=', 'profile.user_id')
        ->get();

        print_r($profile);


    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);

        $profile->status ='3';

        if($profile->save())
        {
            return response()->json([
                'message'=>'Profile has been deleted'
            ]);
        }
    }
}
