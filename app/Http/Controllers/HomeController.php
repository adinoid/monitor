<?php

namespace App\Http\Controllers;

use App\Host;
use App\Check;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $mt_rand = mt_rand(5.0, 45.0);
        $rand = rand(5.0, 50);

        // Check::where('type', 'memory')
        //     ->update([
        //         'last_run_message' => $rand,
        //     ]);

        Check::where('type', 'cpu')
            ->update([
                'last_run_message' => $mt_rand,
            ]);

        $server = Host::where('custom_properties', '1')->first();
        return view(
            'backend/home',
            [
                'server' => $server,
            ]
        );
    }
}
