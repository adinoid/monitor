<?php

namespace App\Http\Controllers;

use App\StatusServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusServerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $status_ = StatusServer::where('name', 'like', env("APP_ENV"))->whereDate('created_at', \App\StatusServer::raw('CURDATE()'))->orderBy('created_at')->get();
        if ($request->has('date'))
            $status_ = StatusServer::where('name', 'like', env("APP_ENV"))->whereDate('created_at', $request->get('date'))->orderBy('created_at')->get();
        $last_slow = 0;
        if (isset($status_[0]))
            $last_slow = $status_[0]->fpm_slow_requests;
        return view('backend/statusserver', compact('status_', "last_slow"));

        // return view('backend/statusserver');
    }
}
