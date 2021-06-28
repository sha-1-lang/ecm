<?php

namespace App\Http\Controllers;

use App\Models\Groups;

class GroupsController extends Controller
{
    public function index()
    {
        return view('groups.index');
    }

    public function create()
    {
        return view('groups.create');
    }

    public function edit(Groups $group)
    {
       
        return view('groups.edit', compact('group'));
    }

}