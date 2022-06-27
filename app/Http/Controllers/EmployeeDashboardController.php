<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeDashboardController extends Controller
{
    public function view()
    {
        return view('employee.dashboard');
    }
}
