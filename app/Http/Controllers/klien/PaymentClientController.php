<?php

namespace App\Http\Controllers\klien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\RekapTagihan;
use App\Model\RekapDptagihan;
use App\Model\Setting;
use App\Model\Payment;
use App\Model\Nomor;

class PaymentClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::where('user_id',\Auth::user()->id)->whereNotNull('receipt_no')->orderBy('created_at','desc')->get();

        return view('klien.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::find(\Auth::user()->id);
        $rekaptagihans = RekapTagihan::where('user_id',\Auth::user()->id)->get();
        // $users = User::where('role','>=',80)->get();
        $tagihan = RekapTagihan::find($id);
        // dd($tagihanuser2);
        // dd($tagihan);
        $setting = Setting::first();
        return view('klien.payments.create', compact('rekaptagihans', 'tagihan', 'setting', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token', '_method','tagihan_id','tertulis']);
        if (\Auth::user()->role <= 20) {
            $data['status'] = 1;
        }
        else {
            $data['status'] = 0;
        }
        $cust = User::find($request->get('user_id'));
        $data['user_role'] = $cust->role;
        $data['nama'] = $cust->nama;
        $data['jenis_pemasukan'] = 1;

        $receiptno = 01;
        $lastreceipt = Payment::latest('id')->first();

        if ($lastreceipt){
            $diffpay = substr($lastreceipt->receipt_no,0,3);
            if ($diffpay == 'PAY'){
                $different = 'no';
            }
            else {
                $different = 'yes';
            }

            if ($different == 'yes') {
                $lastno = Nomor::first();
                if ($lastno) {
                    $no1 = $lastno->npay + 1;
                    $lastno->npay = $no1;
                    $no = str_pad($no1,3,"0",STR_PAD_LEFT);
                    $nouserpad = str_pad(\Auth::user()->id,2,"0",STR_PAD_LEFT);
                    $data['receipt_no'] = 'PAY/'.$no.'/'.date('dmY').'/'.$nouserpad;
                    $lastno->save();
                } else {
                    $lastno['npay'] = 1;
                    $no = str_pad($receiptno,3,"0",STR_PAD_LEFT);
                    $nouserpad = str_pad(\Auth::user()->id,2,"0",STR_PAD_LEFT);
                    $data['receipt_no'] = 'PAY/'.$no.'/'.date('dmY').'/'.$nouserpad;
                    $lastno = Nomor::create($lastno);
                }
            }
            else {
                // jika tidak sama
                $lastno = Nomor::first();
                if ($lastno) {
                    $no1 = $lastno->npay + 1;
                    $lastno->npay = $no1;
                    $no = str_pad($no1,3,"0",STR_PAD_LEFT);
                    $nouserpad = str_pad(\Auth::user()->id,2,"0",STR_PAD_LEFT);
                    $data['receipt_no'] = 'PAY/'.$no.'/'.date('dmY').'/'.$nouserpad;
                    $lastno->save();
                } else {
                    $lastno['npay'] = 1;
                    $no = str_pad($receiptno,3,"0",STR_PAD_LEFT);
                    $nouserpad = str_pad(\Auth::user()->id,2,"0",STR_PAD_LEFT);
                    $data['receipt_no'] = 'PAY/'.$no.'/'.date('dmY').'/'.$nouserpad;
                    $lastno = Nomor::create($lastno);
                }
            }
        }
        else {
            $lastno = Nomor::first();
            if ($lastno) {
                $no1 = $lastno->npay + 1;
                $lastno->npay = $no1;
                $no = str_pad($no1,3,"0",STR_PAD_LEFT);
                $nouserpad = str_pad(\Auth::user()->id,2,"0",STR_PAD_LEFT);
                $data['receipt_no'] = 'PAY/'.$no.'/'.date('dmY').'/'.$nouserpad;
                $lastno->save();
            } else {
                $lastno['npay'] = 1;
                $no = str_pad($receiptno,3,"0",STR_PAD_LEFT);
                $nouserpad = str_pad(\Auth::user()->id,2,"0",STR_PAD_LEFT);
                $data['receipt_no'] = 'PAY/'.$no.'/'.date('dmY').'/'.$nouserpad;
                $lastno = Nomor::create($lastno);
            }
        }
        // dd($data);

        if($request->get('kadaluarsa')!=''){

            $cust->kadaluarsa = $request->get('kadaluarsa');
            $cust->save();
        }

        if($request->get('task_count')!=''){

            $cust->task_count += $request->get('task_count');
            $cust->save();
        }
        
        if($request->get('rdtagihan') == 1){
            $tagihan = RekapTagihan::find($request->get('rekap_tagihan_id'));
            // $tagihan->jml_tagih -= $request->get('nominal');
            $data['rekap_tagihan_id'] = $request->get('rekap_tagihan_id');
        }

        else if($request->get('rdtagihan') == 2){
            $tagihan = RekapDpTagihan::find($request->get('rekap_dptagihan_id'));
            // $tagihan->jml_tagih -= $request->get('nominal');
            $data['rekap_dptagihan_id'] = $request->get('rekap_dptagihan_id');
        }
        // dd($data);

        $payment = Payment::create($data);
        if($data['rdtagihan'] == 1){
            return redirect('/tagihanuser')->with('success', 'Payment requested!');
        }
        else{
            return redirect('/dptagihanuser')->with('success', 'Payment requested!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function bayaruser(Request $request, $id)
    {
        $user = User::find(\Auth::user()->id);
        $rekaptagihans = RekapTagihan::where('user_id',\Auth::user()->id)->get();
        // $users = User::where('role','>=',80)->get();
        $tagihan = RekapTagihan::find($id);
        // dd($tagihanuser2);
        // dd($tagihan);
        $setting = Setting::first();
        return view('klien.bills.paybill', compact('rekaptagihans', 'tagihan', 'setting', 'user'));
    }

    public function bayardpuser(Request $request, $id)
    {
        $user = User::find(\Auth::user()->id);
        $rekaptagihans = RekapDpTagihan::where('user_id',\Auth::user()->id)->get();
        // $users = User::where('role','>=',80)->get();
        $dptagihan = RekapDpTagihan::find($id);
        // dd($tagihanuser2);
        // dd($tagihan);
        $setting = Setting::first();
        return view('klien.dp_bills.paydpbill', compact('rekaptagihans', 'dptagihan', 'setting', 'user'));
    }
}
