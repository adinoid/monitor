<?php

namespace App\Http\Controllers;

use App\Host;
use App\Tes;
use Illuminate\Http\Request;

class ProcessorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $hosts = Host::get();
        // $cpu = Host::where('type', 'cpu')->get();
        $cpu = Host::find(1);
        // $cpu->checks()->where('type', 'cpu')->get();
        return view('backend/processor',  [
            'hosts' => $hosts,
            'cpu' => $cpu
        ]);
    }
}
