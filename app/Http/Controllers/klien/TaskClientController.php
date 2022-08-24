<?php

namespace App\Http\Controllers\klien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Task;
use App\Model\User;
use App\Model\Proyek;
use App\Model\Attachment;

class TaskClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('user_id', \Auth::user()->id)->where('status','<',2)->orderBy('tenggat', 'asc')->get();
        // dd($proyeks);

        return view('klien.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyeks = Proyek::where('user_id', \Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('klien.tasks.create', compact('proyeks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task([
            'user_id' => $request->get('user_id'),
            'id_proyek' => $request->get('id_proyek'),
            'nama_proyek' => $request->get('nama_proyek'),
            'kebutuhan' => $request->get('kebutuhan'),
            'tenggat' => $request->get('tenggat'),
            'severity' => $request->get('severity'),
            'status' => 1,
        ]);

        // dd($task);
        
        $task->save();

        $id_proyek = $request->get('id_proyek');
        $user_id = $request->get('user_id');

        if($id_proyek != null){
            $proyek = Proyek::find($id_proyek);
            $proyek->task_count += 1;
            $proyek->update();
        }

        if($user_id != null){
            $user = User::find($user_id);
            $user->task_count += 1;
            $user->update();
        }

        return redirect('/taskclients')->with('success', 'Task saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);

        return view('klien.tasks.show', compact('task'));
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

    public function createtaskproyek(Request $request, $id)
    {
        $user = User::find(\Auth::user()->id);
        $proyek = Proyek::find($id);
        // dd($proyek);

        return view('klien.proyeks.createtask', compact('user','proyek'));
    }

    public function history()
    {
        $tasks = Task::where('status','=',3)->get();

        // dd($tasks);
        return view('klien.tasks.history', compact('tasks'));
    }
}
