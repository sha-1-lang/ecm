<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventCalender extends Controller
{
     public function index()
    {
        return view('eventcalender.create');
    }

    public function create()
    {
        return view('eventcalender..create');
    }

    public function edit()
    {
        return view('eventcalender.edit');
    }
}
