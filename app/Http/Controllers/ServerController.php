<?php

namespace App\Http\Controllers;

use App\Host;
use App\Check;
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
    $mt_rand = mt_rand(5.0, 45.0);
    $rand = rand(5.0, 50);

    // Check::where('type', 'memory')
    //   ->update([
    //     'last_run_message' => $rand,
    //   ]);

    Check::where('type', 'cpu')
      ->update([
        'last_run_message' => $mt_rand,
      ]);

    $server = Host::where('custom_properties', '1')->first();
    $hosts = Host::get();
    return view('backend/server',  [
      'hosts' => $hosts,
      'server' => $server,
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
