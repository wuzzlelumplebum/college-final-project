<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Task;
use App\Model\Tagihan;
use App\Model\Payment;
use App\Model\Proyek;
use App\Model\User;
use App\Model\Pengeluaran;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
    	//
    }

    public function index()
    {
        $new = Task::where('status', '=', '1')->get()->count();
        $ongoing = Task::where('status', '=', '2')->get()->count();
        $done = Task::where('status', '=', '3')->get()->count();
        $todaynew = Task::where('status', '=', '1')->whereDate('created_at', '=', Carbon::today()->toDateString())->get()->count();
        $todayongoing = Task::where('status', '=', '2')->whereDate('created_at', '=', Carbon::today()->toDateString())->get()->count();
        $todaydone = Task::where('status', '=', '3')->whereDate('created_at', '=', Carbon::today()->toDateString())->get()->count();
        $member = User::where('role','>','20')->get()->count();
        $proyek = Proyek::all();
        $simple = Proyek::where('tipe','=','99')->get()->count();
        $prioritas = Proyek::where('tipe','=','90')->get()->count();
        $premium = Proyek::where('tipe','=','80')->get()->count();
        $pengeluarans = Pengeluaran::all();
        $pendapatans = Payment::all();
        $memberthis = User::where('role','>','20')->whereMonth('created_at','=',Carbon::now()->today()->month)->get()->count();
        $memberlast = User::where('role','>','20')->whereMonth('created_at','=',Carbon::now()->subMonth()->month)->get()->count();
        $proyekthis =  Proyek::whereMonth('created_at','=',Carbon::now()->today()->month)->get()->count();
        $proyeklast =  Proyek::whereMonth('created_at','=',Carbon::now()->subMonth()->month)->get()->count();
        $pengeluaranthis = Pengeluaran::whereMonth('created_at','=',Carbon::now()->today()->month)->get();
        $pengeluaranlast =  Pengeluaran::whereMonth('created_at','=',Carbon::now()->subMonth()->month)->get();
        $pendapatanthis = Payment::whereMonth('created_at','=',Carbon::now()->today()->month)->get();
        $pendapatanlast =  Payment::whereMonth('created_at','=',Carbon::now()->subMonth()->month)->get();
        $pendapatanyear = Payment::whereYear('created_at','=',Carbon::now()->year)->get();
        $pengeluaranyear = Pengeluaran::whereYear('created_at','=',Carbon::now()->year)->get();

        //yearly graph
        $chart = array();
        $chart2 = array();

        $chart[0] = array_fill(1, 12, 0);
        $chart2[0] = array_fill(1, 12, 0);

        $qry = Payment::selectRaw('month(tanggal) as bulan, user_role, sum(nominal) as total ')
        ->whereYear('created_at',Carbon::now()->year)->groupBy('bulan', 'user_role')->get()->toArray();

        $qry2 = Pengeluaran::selectRaw('month(tanggal) as bulan, jenis_pengeluaran, sum(nominal) as total ')
        ->whereYear('tanggal',Carbon::now()->year)->groupBy('bulan', 'jenis_pengeluaran')->get()->toArray();

        foreach ($qry as $val) {
            // $chart[$val['user_role']][$val['bulan']] = $val['total'];
            $chart[0][$val['bulan']] += $val['total'];

        }

        foreach ($qry2 as $val2) {
            // $chart[$val['user_role']][$val['bulan']] = $val['total'];
            $chart2[0][$val2['bulan']] += $val2['total'];

        }
        // dd($val2);

        return view("index", compact('new','ongoing','done','todaynew','todayongoing','todaydone','member','proyek','simple','prioritas','premium',
        'pengeluarans','pendapatans','memberlast','memberthis','proyekthis','proyeklast','pengeluaranthis','pengeluaranlast','pendapatanthis','pendapatanlast',
        'pendapatanyear','pengeluaranyear','chart','chart2'));
    }

    public function karyawan()
    {
        $new = Task::where('status', '=', '1')->get()->count();
        $ongoing = Task::where('status', '=', '2')->get()->count();
        $done = Task::where('status', '=', '3')->get()->count();
        $todaynew = Task::where('status', '=', '1')->whereDate('created_at', '=', Carbon::today()->toDateString())->get()->count();
        $todayongoing = Task::where('status', '=', '2')->whereDate('created_at', '=', Carbon::today()->toDateString())->get()->count();
        $todaydone = Task::where('status', '=', '3')->whereDate('created_at', '=', Carbon::today()->toDateString())->get()->count();
        $member = User::where('role','>','20')->get()->count();
        $proyek = Proyek::all();
        $simple = Proyek::where('tipe','=','99')->get()->count();
        $prioritas = Proyek::where('tipe','=','90')->get()->count();
        $premium = Proyek::where('tipe','=','80')->get()->count();
        $memberthis = User::where('role','>','20')->whereMonth('created_at','=',Carbon::now()->today()->month)->get()->count();
        $memberlast = User::where('role','>','20')->whereMonth('created_at','=',Carbon::now()->subMonth()->month)->get()->count();
        $proyekthis =  Proyek::whereMonth('created_at','=',Carbon::now()->today()->month)->get()->count();
        $proyeklast =  Proyek::whereMonth('created_at','=',Carbon::now()->subMonth()->month)->get()->count();
        return view("index", compact('new','ongoing','done','todaynew','todayongoing','todaydone','member','proyek','simple','prioritas','premium',
        'memberlast','memberthis','proyekthis','proyeklast'));
    }

    public function keuangan()
    {
        $new = Task::where('status', '=', '1')->get()->count();
        $ongoing = Task::where('status', '=', '2')->get()->count();
        $done = Task::where('status', '=', '3')->get()->count();
        $todaynew = Task::where('status', '=', '1')->whereDate('created_at', '=', Carbon::today()->toDateString())->get()->count();
        $todayongoing = Task::where('status', '=', '2')->whereDate('created_at', '=', Carbon::today()->toDateString())->get()->count();
        $todaydone = Task::where('status', '=', '3')->whereDate('created_at', '=', Carbon::today()->toDateString())->get()->count();
        $member = User::where('role','>','20')->get()->count();
        $proyek = Proyek::all();
        $simple = Proyek::where('tipe','=','99')->get()->count();
        $prioritas = Proyek::where('tipe','=','90')->get()->count();
        $premium = Proyek::where('tipe','=','80')->get()->count();
        $memberthis = User::where('role','>','20')->whereMonth('created_at','=',Carbon::now()->today()->month)->get()->count();
        $memberlast = User::where('role','>','20')->whereMonth('created_at','=',Carbon::now()->subMonth()->month)->get()->count();
        $proyekthis =  Proyek::whereMonth('created_at','=',Carbon::now()->today()->month)->get()->count();
        $proyeklast =  Proyek::whereMonth('created_at','=',Carbon::now()->subMonth()->month)->get()->count();
        return view("index", compact('new','ongoing','done','todaynew','todayongoing','todaydone','member','proyek','simple','prioritas','premium',
        'memberlast','memberthis','proyekthis','proyeklast'));
    }

    // public function customer()
    // {
    //     $new = Task::where('status', '=', '1')->where('user_id',\Auth::user()->id)->get()->count();
    //     $ongoing = Task::where('status', '=', '2')->where('user_id',\Auth::user()->id)->get()->count();
    //     $done = Task::where('status', '=', '3')->where('user_id',\Auth::user()->id)->get()->count();
    //     $tagihan = Tagihan::where('user_id',\Auth::user()->id)->where('status','!=','2')->get();
    //     $totalbayar = Tagihan::where('user_id',\Auth::user()->id)->where('status','!=','2')->sum('jml_bayar');
    //     $lastpayment = Payment::where('user_id',\Auth::user()->id)->where('status',1)->orderBy('tgl_bayar','desc')->get()->first();
    //     dd($tagihan);
    //     return view("index", compact('new','ongoing','done','tagihan','lastpayment','totalbayar'));
    // }

    //test view costumer()
    public function customer(){
        
        $new = Task::where('status', '=', '1')->where('user_id',\Auth::user()->id)->get()->count();
        $ongoing = Task::where('status', '=', '2')->where('user_id',\Auth::user()->id)->get()->count();
        $done = Task::where('user_id',\Auth::user()->id)->where('status', '=', '3')->get()->count();
        $website = Proyek::where('user_id',\Auth::user()->id)->get()->count();
        $taskall = User::where('id',\Auth::user()->id)->value('task_count');
        $tagihans = Tagihan::where('user_id',\Auth::user()->id)->orderBy('created_at')->orderBy('status','desc')->get();
        $proyeks = Proyek::where('user_id',\Auth::user()->id)->orderBy('masa_berlaku','asc')->get();
        $highproyek = Proyek::where('user_id',\Auth::user()->id)->orderBy('tipe','asc')->first();
        $taskcounts = Task::where('user_id',\Auth::user()->id)->get()->count();
        $tasks = Task::where('user_id',\Auth::user()->id)->get();
        $tagihanactives = Tagihan::where('user_id',\Auth::user()->id)->where('status','!=','2')->get()->count();
        $tagihanhistories = Tagihan::where('user_id',\Auth::user()->id)->where('status','=','2')->get();
        $taskactives = Task::where('user_id',\Auth::user()->id)->where('status','!=','3')->get()->count();
        $user = User::where('id',\Auth::user()->id)->first();
        // dd($user);
        return view("client.layout",compact('new','ongoing','done','website','taskall','proyeks','tagihans','taskcounts','tasks','tagihanactives','tagihanhistories','highproyek','user'));
    }

    // public function customer()
    // {
    //     $new = Task::where('status', '=', '1')->where('user_id',\Auth::user()->id)->get()->count();
    //     $ongoing = Task::where('status', '=', '2')->where('user_id',\Auth::user()->id)->get()->count();
    //     $done = Task::where('status', '=', '3')->where('user_id',\Auth::user()->id)->get()->count();
    //     return view("client.layout", compact('new','ongoing','done'));
    // }
        
    
}
