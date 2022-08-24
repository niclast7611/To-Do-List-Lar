<?php
   
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Todo;
use Illuminate\Support\Facades\Validator;
   
class TodoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function index()
    {
        $todos = Todo::all();
        return Inertia::render('Todos/Index', ['todos' => $todos]);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        return Inertia::render('Todos/Create');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'task' => ['required'],
            'description' => ['required'],
            'status'=> ['required'],
            'user'=> ['required'],
        ])->validate();
   
        Todo::create($request->all());
    
        return redirect()->route('todos.index');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Todo $todo)
    {
        return Inertia::render('Todos/Edit', [
            'todo' => $todo
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        Validator::make($request->all(), [
            'task' => ['required'],
            'description' => ['required'],
            'status'=> ['required'],
            'user'=> ['required'],
        ])->validate();
    
        Todo::find($id)->update($request->all());
        return redirect()->route('todos.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy($id)
    {
        Todo::find($id)->delete();
        return redirect()->route('todos.index');
    }
}
