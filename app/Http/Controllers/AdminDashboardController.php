<?php

namespace App\Http\Controllers;

use App\TrackerInfo;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function view()
    {
        $info = TrackerInfo::all();
        return view("admin.dashboard",['info'=> $info]);
    }
}
