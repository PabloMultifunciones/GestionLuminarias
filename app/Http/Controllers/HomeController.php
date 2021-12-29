<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;
use App\Models\Role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = auth()->user()->id;
        $usuario = User::find($id);
        $tasks = $usuario->task;
        $role = $usuario->role->role;
        return view('home',compact('tasks','role'));
    }

    public function deletetask($id){
        $task = Task::find($id)->first();
        $task->delete();
        return $this->index();
    }
    public function addtask(Request $request){
        $task = new Task;
        $task->user_id = $request->user_id;
        $task->calle = $request->calle;
        $task->numero = $request->numero;
        $task->descripcion_problema = $request->descripcion_problema;
        $task->zona = $request->zona;
        $task->save();
        return $this->index();
    }
    
}
