<?php

namespace App\Http\Controllers;

use App\Location;
use App\User;
use App\Http\Requests\LocationRequest;


class LocationController extends Controller
{

    public function store($user_id,LocationRequest $request) 
    {
        //In the task we have no authentication therefore we need to pass valid id as parameter of the request
        //in case authentication is implemented we could use
        //$user = Auth::user(); 
        
            $user = User::where('id', $user_id)->first();
            if(!$user){ return response()->json(['msg' => 'user not found'], 404); }
            
            $locationData = $request->validated();
            $locationData['user_id'] = $user->id; 
            $location = Location::create($locationData); 
            return response()->json($location, 200);
        
    }
    
}
