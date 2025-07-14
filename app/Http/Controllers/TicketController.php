<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display tickets
        return view('tickets.index');
    }
}
