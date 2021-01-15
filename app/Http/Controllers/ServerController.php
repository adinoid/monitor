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

    $persentase = DB::table('log_status')->select('persentase as persentase')->orderBy('id_log', 'asc')->get();
    $waktu = DB::table('log_status')->select('waktu as waktu')->orderBy('id_log', 'asc')->get();
    return view('backend/server',  [
      'hosts' => $hosts,
      'server' => $server,
      'persentase' => $persentase,
      'waktu' => $waktu,
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

    $output = null;
    $retval = null;
    exec('sudo iptables -I INPUT -p icmp --icmp-type any -j DROP', $output, $retval);
    // shell_exec("sudo iptables -I INPUT -p icmp --icmp-type any -j ACCEPT");
    // Alert::success('Data Jobs', 'Berhasil Diubah');
    // return redirect('http://3.83.220.223')->with(['success' => 'Server Berhasil diupdate']);
    return redirect('server')->with(['success' => 'Server Berhasil diupdate']);
  }
}
