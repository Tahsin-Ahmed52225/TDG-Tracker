<?php

namespace App\Http\Controllers;

use App\TrackerInfo;
use Illuminate\Http\Request;

class TrackerController extends Controller
{
   public function update(Request $request){
           if($request->isMethod("POST")){
            // $info = TrackerInfo::create([
            //     "info"=> $request->info,
            // ]);
            // if($info){
                return response()->json(["status"=>$request->info]);
        //     }
        //    }
            }
   }
}
