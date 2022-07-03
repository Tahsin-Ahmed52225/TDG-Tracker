<?php

namespace App\Http\Controllers;

use App\TrackerInfo;
use Illuminate\Http\Request;

class TrackerController extends Controller
{
   public function update(Request $request){
           if($request->isMethod("POST")){
              if(!TrackerInfo::where("IP",$request->info["ip"])){
                $info = TrackerInfo::create([
                    "IP"=> $request->info["ip"],
                    "ActiveDomain"=> $request->info["ActiveDomain"],
                    "TemplateName"=>  $request->info["TemplateName"],
                    "browserName"=>  $request->info["browserName"],
                    "browserVersion"=>  $request->info["browserVersion"],
                    "city"=>  $request->info["city"],
                    "country"=>  $request->info["country"],
                    "continent"=>  $request->info["continent"],
                ]);
                if($info){
                    return response()->json(["status"=> "Updated"]);
                 }else{
                    return response()->json(["status"=> "Reload Required"]);
                 }
              }else{
                return response()->json(["status"=> "Up to date"]);
              }

            }else{
                return response()->json(["status"=> "Something went wrong"]);
            }

   }
   public function deleteTrackInfo(Request $request){
    if($request->isMethod("GET")){
        TrackerInfo::whereNotNull('id')->delete();
        return redirect()->back()->with('success', 'All Tracking info deleted');
    }
   }
   public function deleteSingleinfo(Request $request){
     if($request->isMethod("GET")){
        $info = TrackerInfo::find();
        if($info){
            $info->delete();
            return redirect()->back()->with('success', 'Info deleted');
        }
     }
   }
}
