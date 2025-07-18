<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $filasTickets = [
            'pendente' => [
                'count' => 5,
                'color' => 'danger'
            ],
            'andamento' => [
                'count' => 2,
                'color' => 'warning'
            ],
            'encerrado' => [
                'count' => 0,
                'color' => 'primary'
            ],
        ];
        return view('tickets.index', compact('filasTickets'));
    }

    public function fila()
    {
        return view('tickets.fila');
    }

    public function novo()
    {
        return view('tickets.novo');
    }
}
