<?php

namespace App\Http\Controllers;

use App\Host;
use App\Check;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class SystemController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $mt_rand = mt_rand(0.1, 99);
    $rand = rand(0.1, 99);
    // $mt_rand = mt_rand(0, 0);
    // $rand = rand(0, 0);

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

    $id_server = 9;
    DB::table('log_status')->insert([
      'id_hosts' => $id_server,
      'persentase' => $mt_rand,
      'waktu' => Carbon::NOW(),
    ]);

    $server =  DB::table('hosts')->join('checks', 'checks.host_id', '=', 'hosts.id')
      ->where('checks.type', 'cpu')
      ->where('hosts.custom_properties', '1')->first();
    $hosts = Host::get();
    $cpus = Check::where('type', 'mysql')
      ->orWhere('type', 'apache')
      ->orWhere('type', 'memcached')
      ->get();

    // $grafik =  DB::table('log_status')
    //   ->orderBy('waktu', 'asc')
    //   ->get();

    // $persentase = DB::table('log_status')
    //   ->select('persentase')
    //   ->orderBy('persentase', 'asc');

    // $waktu = DB::table('log_status')
    //   ->select('waktu')
    //   ->orderBy('waktu', 'asc');

    $persentase = DB::table('log_status')->select('persentase as persentase')->orderBy('id_log', 'asc')->get();
    $waktu = DB::table('log_status')->select('waktu as waktu')->orderBy('id_log', 'asc')->get();
    // $logstatus = DB::table('log_status')->select('persentase', 'waktu')->get();


    return view('backend/system',  [
      'hosts' => $hosts,
      'cpu' => $cpus,
      'server' => $server,
      'persentase' => $persentase,
      'waktu' => $waktu,
    ]);
  }

  public function resetlog()
  {
    DB::table('log_status')->delete();
    return redirect('system')->with(['success' => 'Log History Berhasil bersihkan']);
  }
}
