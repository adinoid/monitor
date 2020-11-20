<?php

namespace App\Http\Controllers;

use App\Host;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

  public function disable($id)
  {
    DB::table('hosts')->where('id', $id)
      ->update([
        'custom_properties' => '0',
        'updated_at' => Carbon::NOW(),
      ]);
    // Alert::success('Data Jobs', 'Berhasil Diubah');
    return redirect('server')->with(['success' => 'Server Berhasil diupdate']);
  }

  public function activate($id)
  {
    DB::table('hosts')
      ->update([
        'custom_properties' => '0',
      ]);
    DB::table('hosts')->where('id', $id)
      ->update([
        'custom_properties' => '1',
        'updated_at' => Carbon::NOW(),
      ]);
    // Alert::success('Data Jobs', 'Berhasil Diubah');
    return redirect('server')->with(['success' => 'Server Berhasil diupdate']);
  }
}
