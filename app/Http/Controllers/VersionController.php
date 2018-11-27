<?php

namespace App\Http\Controllers;

use App\Version;
use App\Http\Requests\VersionRequest;


class VersionController extends Controller
{

     public function store(VersionRequest $request) 
    {
        $versionData = $request->validated();
        $version = Version::create($versionData); 
        //returning json with status 201( Created )
        return response()->json($version, 201);
    }
    
     public function isUpToDate(VersionRequest $request) 
    {
         $userVersion = $request->validated();
         $latestVersion = Version::latest('datetime')->first();
         $needUpdate = $this->compareVersions($userVersion['version'], $latestVersion->version);
         return response()->json(["update" => $needUpdate], 200);
    }
    
    private function compareVersions($userVersion,$latestVersion){
        
        $userVerToArr = explode(".",$userVersion);
        $latestVerToArr = explode(".",$latestVersion);
        
        $userVersion = floatVal($userVerToArr[0].'.'.$userVerToArr[1]);
        $latestVersion = floatVal($latestVerToArr[0].'.'.$latestVerToArr[1]);
        return ($userVersion < $latestVersion);
    }
}
