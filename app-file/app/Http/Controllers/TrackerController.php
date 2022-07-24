<?php

namespace App\Http\Controllers;

use App\TrackerInfo;
use Illuminate\Http\Request;

class TrackerController extends Controller
{
     /**
     * Updating the data into database
     *
     */
   public function update(Request $request){
           if($request->isMethod("POST")){
            //checking for duplicate info
            $alreay_have_ip = count(TrackerInfo::where("IP",$request->info["ip"])->get());
              if($alreay_have_ip == 0){
                //Creating info model
                $info = TrackerInfo::create([
                    "IP"=> $request->info["ip"],
                    "ActiveDomain"=> $request->info["ActiveDomain"],
                    "TemplateName"=>  $request->info["TemplateName"],
                    "browserName"=>  $request->info["browserName"],
                    "browserVersion"=>  $request->info["browserVersion"],
                    "city"=>  $request->info["city"],
                    "country"=>  $request->info["country"],
                    "continent"=>  $request->info["continent"],
                    "stage"=> 0,
                ]);
                if($info){
                    return response()->json(["status"=> "Updated"]);
                 }else{
                    return response()->json(["status"=> "Reload Required"]);
                 }
              }else{
                $stage = TrackerInfo::where("IP",$request->info["ip"])->get('stage');
                return response()->json(["status"=> "Up to date","stage"=> $stage]);
              }

            }else{
                return response()->json(["status"=> "Something went wrong"]);
            }

   }
      /**
     *
     * Deleting all the info
     *
     */
   public function deleteTrackInfo(Request $request){
    if($request->isMethod("GET")){
        TrackerInfo::whereNotNull('id')->delete();
        return redirect()->back()->with('success', 'All Tracking info deleted');
    }
   }
       /**
     *
     * Delete a singular info
     *
     */
   public function deleteSingleinfo(Request $request , $id){
     if($request->isMethod("GET")){
        $info = TrackerInfo::find($id);
        if($info){
            $info->delete();
            session()->flash('success', "Successfully Deleted");
        }else{
            session()->flash('warning', "Something Went Wrong");
        }
     }else{
        return redirect()->back();
     }
   }
   public function lockIP(Request $request , $id){
    if($request->isMethod("GET")){
        $info = TrackerInfo::find($id);
        if($info){
            $info->stage = ($info->stage == 0 ) ? 1 : 0;
            $info->save();
            session()->flash('success', "Successfully Updated");
        }else{
            session()->flash('warning', "Something Went Wrong");
        }
     }else{
        return redirect()->back();
     }
   }
   public function getLockedIP(Request $request){
       $lockedIP = TrackerInfo::where("stage","1")->get("IP");
       return response()->json($lockedIP);
   }
}
