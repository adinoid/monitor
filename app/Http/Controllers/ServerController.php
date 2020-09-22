<?php

namespace App\Http\Controllers;

use App\Host;
use Illuminate\Http\Request;

class ServerController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $hosts = Host::get();
    return view('backend/server',  [
      'hosts' => $hosts
    ]);
  }
}
