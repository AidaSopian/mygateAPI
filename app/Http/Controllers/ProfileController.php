<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Profile;
use App\Http\Resources\Profile as ProfileResource;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;

class ProfileController extends Controller
{
    public function create(Request $request)
        {
            //update or edit
            $profile = $request->isMethod('put') ? Profile::findOrFail($request->id) : new Profile;
    
            $profile->user_id = $request->input('user_id');
            $profile->name = $request->input('name');
            $profile->phone = $request->input('phone');
            $profile->address = $request->input('address');
            $profile->zip = $request->input('zip');
            $profile->city = $request->input('city');
            $profile->state = $request->input('state');
            $profile->country = $request->input('country');

            


            if($profile->save()) {
    
                return new ProfileResource($profile);
            }
        }
    
        public function show(Request $request)
        {
            $profile = $request->get('id');
            //show unit and blocks table 
           
            return DB::table('profile')
            ->join('users', 'users.user_id', '=', 'profile.user_id')
            //->where('profile.id', $profile)
           //->select('profile.', 'users.')
            ->get();
            
        }
        public function destroy($profile)
            {
                $profile =Profile::findOrFail($profile);
        
                $profile->status = "3";
        
                if($profile->save()){
                    return response()->json([
                        'message' => "Profile has been deleted"
                    ]);
                }
            }
    
}