<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GmailConnection;
use App\Models\Listing;

class GmailConnectionController extends Controller
{
     public function index()
    {
        return view('gmailconnection.index');
    }

    public function create()
    {
        return view('gmailconnection.create');
    }

    public function edit(GmailConnection $gmailconnection)
    {
        
        return view('gmailconnection.edit', compact('gmailconnection'));
    }
    public function import()
    {
        return view('gmailconnection.connection-import');
    }
}
