<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoRequest;
use App\Http\Requests\UpdateTodosRequest;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("todos.index")->with("todos",auth()->user()->todo()->paginate(3)) ; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("todos.create") ; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTodoRequest $request)
    {
        $image = $request->image->store("todos") ; 
        auth()->user()->todo()->create([
            "title"=>$request->title , 
            "content"=>$request->content , 
            "image"=>$image 
        ]) ; 
        return redirect(route("todo.index")) ; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        
        return view("todos.show")->with("todo",$todo) ; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit (Todo $todo)
    {
        return view("todos.create")->with("todo",$todo) ; 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodosRequest $request, Todo $todo)
    {
        if($request->hasFile("image")){
            $todo->deleteImage() ; 
            $image = $request->image->store("todos")  ;
            $todo->update([
                "title"=>$request->title , 
                "content"=>$request->content , 
                "image"=>$image 
            ]) ; 
            return redirect(route("todo.index")) ; 
        }
        else {
            $todo->update([
                "title"=>$request->title , 
                "content"=>$request->content 
            ]) ; 
            return redirect(route("todo.index")) ; 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->deleteImage() ; 
        $todo->delete() ; 
        return redirect()->back() ; 
    }
    public function complete(Todo $todo){
        $todo->update([
            "complete"=>1 
        ]) ;
        return redirect()->back() ; 
    }
}
