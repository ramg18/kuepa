<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leads;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $leads = Leads::all();
        $estados = [
            "contactar" => 'contactar',
            "contactado" => 'contactado'
        ];
        return view('home', compact('leads', 'estados'));
        // return view('home', compact('leads'));
    }
}
