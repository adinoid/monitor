<?php

namespace App\Http\Controllers;

use App\Host;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $server = Host::where('custom_properties', '1')->first();
        return view(
            'backend/home',
            [
                'server' => $server,
            ]
        );
    }
}
