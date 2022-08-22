<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Task;
use App\Model\Tagihan;
use App\Model\Payment;
use App\Model\Proyek;
use App\Model\User;
use App\Model\Pengeluaran;
use App\Model\RekapDptagihan;
use App\Model\RekapTagihan;
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
        $pendapatanyear = Payment::whereYear('tanggal','=',Carbon::now()->year)->get();
        $pengeluaranyear = Pengeluaran::whereYear('tanggal','=',Carbon::now()->year)->get();

        //yearly graph
        $chart = array();
        $chart2 = array();

        //pie
        $pie = array();
        $pie2 = array();
        $pie3 = array();
        $pie4 = array();

        $chart[0] = array_fill(1, 12, 0);
        $chart2[0] = array_fill(1, 12, 0);

        foreach(config("custom.jenis_proyek") as $key => $value)
        {
            $pie[$key] = 0;
        }

        foreach(config("custom.jenis_layanan") as $key => $value)
        {
            $pie2[$key] = 0;
        }

        foreach(config("custom.jenis_layanan") as $key => $value)
        {
            $pie3[$key] = 0;
        }

        foreach(config("custom.jenis_layanan") as $key => $value)
        {
            $pie4[$key] = 0;
        }

        $qry = Payment::selectRaw('month(tanggal) as bulan, sum(nominal) as total ')
        ->whereYear('tanggal',Carbon::now()->year)->groupBy('bulan')->get()->toArray();

        $qry2 = Pengeluaran::selectRaw('month(tanggal) as bulan, sum(nominal) as total ')
        ->whereYear('tanggal',Carbon::now()->year)->groupBy('bulan')->get()->toArray();

        foreach ($qry as $val) {
            // $chart[$val['user_role']][$val['bulan']] = $val['total'];
            $chart[0][$val['bulan']] += $val['total'];
        }
        // dd($val);

        foreach ($qry2 as $val2) {
            // $chart[$val['user_role']][$val['bulan']] = $val['total'];
            $chart2[0][$val2['bulan']] += $val2['total'];
        }
        // dd($val2);

        $qrypie1 = Proyek::selectRaw('jenis_proyek, count(*) as total');

        $qrypie1 = $qrypie1->groupBy('jenis_proyek')->whereNotNull('jenis_proyek')->get()->toArray();
        // dd($qrypie1);

        foreach ($qrypie1 as $pie1val) {
            if($pie1val['total'] != 0){
                $pie[$pie1val['jenis_proyek']] += $pie1val['total'];
            }
        }

        $qrypie2 = Proyek::selectRaw('jenis_layanan, count(*) as total')->where('jenis_proyek', '=', 1);

        $qrypie2 = $qrypie2->groupBy('jenis_layanan')->whereNotNull('jenis_layanan')->get()->toArray();
        // dd($qrypie2);

        foreach ($qrypie2 as $pie2val) {
            if($pie2val['total'] != 0){
                $pie2[$pie2val['jenis_layanan']] += $pie2val['total'];
            }
        }

        $qrypie3 = Proyek::selectRaw('jenis_layanan, count(*) as total')->where('jenis_proyek', '=', 3);

        $qrypie3 = $qrypie3->groupBy('jenis_layanan')->whereNotNull('jenis_layanan')->get()->toArray();
        // dd($qrypie3);

        foreach ($qrypie3 as $pie3val) {
            if($pie3val['total'] != 0){
                $pie3[$pie3val['jenis_layanan']] += $pie3val['total'];
            }
        }

        $qrypie4 = Proyek::selectRaw('jenis_layanan, count(*) as total')->where('jenis_proyek', '=', 4);

        $qrypie4 = $qrypie4->groupBy('jenis_layanan')->whereNotNull('jenis_layanan')->get()->toArray();
        // dd($qrypie4);

        foreach ($qrypie4 as $pie4val) {
            if($pie4val['total'] != 0){
                $pie4[$pie4val['jenis_layanan']] += $pie4val['total'];
            }
        }

        return view("index", compact('new','ongoing','done','todaynew','todayongoing','todaydone','member','proyek','simple','prioritas','premium',
        'pengeluarans','pendapatans','memberlast','memberthis','proyekthis','proyeklast','pengeluaranthis','pengeluaranlast','pendapatanthis','pendapatanlast',
        'pendapatanyear','pengeluaranyear','chart','chart2','pie','pie2','pie3','pie4'));
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

        //yearly graph
        $chart = array();
        $chart2 = array();

        //pie
        $pie = array();
        $pie2 = array();

        foreach(config("custom.j_pemasukan") as $key => $value)
        {
            $pie[$key] = 0;
        }

        foreach(config("custom.kat_pengeluaran") as $key => $value)
        {
            $pie2[$key] = 0;
        }

        $chart[0] = array_fill(1, 12, 0);
        $chart2[0] = array_fill(1, 12, 0);

        $qry = Payment::selectRaw('month(tanggal) as bulan, sum(nominal) as total ')
        ->whereYear('tanggal',Carbon::now()->year)->groupBy('bulan')->get()->toArray();

        $qry2 = Pengeluaran::selectRaw('month(tanggal) as bulan, sum(nominal) as total ')
        ->whereYear('tanggal',Carbon::now()->year)->groupBy('bulan')->get()->toArray();

        foreach ($qry as $val) {
            // $chart[$val['user_role']][$val['bulan']] = $val['total'];
            $chart[0][$val['bulan']] += $val['total'];
        }
        // dd($val);

        foreach ($qry2 as $val2) {
            // $chart[$val['user_role']][$val['bulan']] = $val['total'];
            $chart2[0][$val2['bulan']] += $val2['total'];
        }
        // dd($val2);

        // pie pemasukan
        $qrypie1 = Payment::selectRaw('jenis_pemasukan, sum(nominal) as total');

        $qrypie1 = $qrypie1->whereYear('tanggal', Carbon::now()->year)->groupBy('jenis_pemasukan')->get()->toArray();
        // dd($qrypie1);

        foreach ($qrypie1 as $pie1val) {
            if($pie1val['total'] != 0){
                $pie[$pie1val['jenis_pemasukan']] += $pie1val['total'];
            }
        }
        // dd($pie);

        // pie pengeluaran
        $qrypie2 = Pengeluaran::selectRaw('jenis_pengeluaran, sum(nominal) as total');

        $qrypie2 = $qrypie2->whereYear('tanggal', Carbon::now()->year)->groupBy('jenis_pengeluaran')->get()->toArray();
        // dd($qrypie2);

        foreach ($qrypie2 as $pie2val) {
            // dump($pie2val);
            if($pie2val['total'] != 0){
                $pie2[$pie2val['jenis_pengeluaran']] += $pie2val['total'];
            }
        }
        // dd($pie2);

        return view("index", compact('new','ongoing','done','todaynew','todayongoing','todaydone','member','proyek','simple','prioritas','premium',
        'memberlast','memberthis','proyekthis','proyeklast','chart','chart2','pie','pie2'));
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

        $proyekclients = Proyek::where('user_id', \Auth::user()->id)->get();
        $dptagihanclient = RekapDptagihan::where('user_id', \Auth::user()->id)->where('status','<',4)->get()->sum('total');
        $tagihanclient = RekapTagihan::where('user_id', \Auth::user()->id)->where('status','<',4)->get()->sum('total');
        $websiteclient = Proyek::where('user_id', \Auth::user()->id)->where('jenis_proyek','=',1)->get()->count();
        $adsclient = Proyek::where('user_id', \Auth::user()->id)->where('jenis_proyek','=',2)->get()->count();
        $siclient = Proyek::where('user_id', \Auth::user()->id)->where('jenis_proyek','=',3)->get()->count();
        $mobileclient = Proyek::where('user_id', \Auth::user()->id)->where('jenis_proyek','=',4)->get()->count();
        $customclient = Proyek::where('user_id', \Auth::user()->id)->where('jenis_proyek','=',5)->get()->count();
        
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

        // dd($proyekclients);
        
        return view("klien.index",compact(
            'new','ongoing','done','website','taskall','proyeks','tagihans','taskcounts','tasks',
            'tagihanactives','tagihanhistories','highproyek','user',
            'dptagihanclient','tagihanclient','websiteclient','adsclient','siclient','mobileclient','customclient','proyekclients'));
    }
}
