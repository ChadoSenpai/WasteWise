<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $page = [
            'parent' => '',
            'child'  => '',
            'title'  => config('app.name'),
            'crumb'  => 'Dashboard'
        ];

        return view('dashboard',compact('page'));
    }
}
