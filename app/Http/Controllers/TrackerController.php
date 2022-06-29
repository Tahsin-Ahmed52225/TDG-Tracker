<?php

namespace App\Http\Controllers;

use App\TrackerInfo;
use Illuminate\Http\Request;

class TrackerController extends Controller
{
   public function update(Request $request){
           if($request->isMethod("POST")){
            $user_info = serialize($request->info);

                $info = TrackerInfo::create([
                    "info"=> $user_info,
                ]);
                if($info){
                    return response()->json(["status"=>"updated"]);
                }
             }else{
                return redirect("www.designtocodes.com");
             }

   }
   public function deleteTrackInfo(Request $request){
    if($request->isMethod("GET")){
        TrackerInfo::whereNotNull('id')->delete();
        return redirect()->back()->with('success', 'All Tracking info deleted');
    }
   }
}
