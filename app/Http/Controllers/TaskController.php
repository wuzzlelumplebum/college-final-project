<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Model\Task;
use App\Model\User;
use App\Model\Proyek;
use App\Model\Attachment;
use App\Model\Notification;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::select()->where('status','<',3)->orderBy('tenggat', 'asc')->get();
        
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role','>','20')->get(); //role customer
        $handlers = User::where('role','10')->get(); //role karyawan
        $finances = User::where('role','20')->get(); //keuangan
        
        return view('tasks.create', compact('users','handlers','finances'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'kebutuhan'=>'required'
        ]);

        $task = new Task([
            'user_id' => $request->get('user_id'),
            'kebutuhan' => $request->get('kebutuhan'),
        ]);

        if($request->get('handler')!=''){
            $task->handler = $request->get('handler');
        }

        $task->save();

        return redirect('/tasks')->with('success', 'Task saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::where('role','>','20')->get(); //role customer
        $handlers = User::where('role','10')->get(); //role karyawan
        $finances = User::where('role','20')->get(); //role keuangan
        $attachment = Attachment::where('task_id', '=', $id)->get();
        $task = Task::find($id);

        if (\Auth::user()->role>20 && $task->user_id != \Auth::user()->id) {
            return redirect('/tasks')->with('error', 'Akses tidak diperbolehkan');
        }

        // if (\Auth::user()->role>20 && $task->status == '2') {
        //     return redirect('/tasks')->with('error', 'Task Sedang Dikerjakan');
        // }

        return view('tasks.show', compact('task','users','handlers','attachment','finances')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $user = User::where('id',$task->user_id)->get();
        $proyeks = Proyek::where('id',$task->id_proyek)->get();
        $handlers = User::where('role','10')->get(); //role karyawan

        // dd($proyeks);

        // if (\Auth::user()->role>20 && $task->status == '2') {
        //     return redirect('/tasks')->with('error', 'Task Sedang Dikerjakan');
        // }

        return view('tasks.edit', compact('task', 'handlers','proyeks','user')); 
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
        $request->validate([
            //'status'=>'required',
        ]);

        $task = Task::find($id);
        $data = $request->except(['_token', '_method', 'file']);

        if($request->get('handler') != ''){
            $data['handler'] = $request->get('handler');
            $data['status'] = 2;
        }
        
        $task->update($data);

        return redirect('/tasks')->with('success', 'Task updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect('/tasks')->with('success', 'Task deleted!');
    }

    public function updatestatus(Request $request)
    {
        $task = Task::find($request->id);
        $task->status = $request->status;

        // print_r($task);
        $task->save();

        $proyek = Proyek::find($task->id_proyek);
        $proyek->task_done += 1;

        $proyek->update();
    }

    public function changehandler(Request $request)
    {
        $task = Task::find($request->id);
        $task->status = $request->status;
        $task->handler = $request->user_id;
        $task->save();
        
        return response()->json(['success'=>'Data changed successfully.']);
    }

    public function history()
    {
        $tasks = Task::where('status','=','3')->get();
        
        return view('tasks.history', compact('tasks'));
    }
}
