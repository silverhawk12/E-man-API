<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function store(UserRequest $request) 
    {
        //UserRequest is already validated when controller method is hit
        $userData = $request->validated();
        //assuming password is provided to the API as plain text
        //probably we could get it as a hash directly
        $userData['password'] = bcrypt($userData['password']);
        //generate username 
        $userData['name'] = $this->generateUserName();
        $user = User::create($userData); 
        //returning json with status 201( Created )
        return response()->json($user, 201);
    }

    
    private function generateUserName() {
        return 'User_'. mt_rand();
    }
    
}
