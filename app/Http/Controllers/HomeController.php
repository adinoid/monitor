<?php

namespace App\Http\Controllers;

use App\Host;
use App\Check;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        DB::table('checks')->join('hosts', 'checks.host_id', '=', 'hosts.id')
            ->where('checks.type', 'cpu')
            ->where('hosts.custom_properties', 1)
            ->update([
                'last_run_message' => $mt_rand,
            ]);

        DB::table('checks')->join('hosts', 'checks.host_id', '=', 'hosts.id')
            ->where('checks.type', 'memory')
            ->where('hosts.custom_properties', 1)
            ->update([
                'last_run_message' => $rand,
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
