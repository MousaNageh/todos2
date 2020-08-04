<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{ 
    public function __construct()
    {
        $this->middleware(["emailChanges"])->only(["update"]) ; 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        return view("users.edit")->with("user",$user) ; 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateUserRequest $request, User $user)
    { 
        
        if($request->password)
        {
            $request->validate([
                "password"=>"min:6|string" 
            ]) ; 
        }
        if($request->hasFile("image")){
            if($user->hasImage()){
                $user->deleteImage() ; 
            }
            $image = $request->image->store("users") ; 
            if($request->password !=null)
            {
                auth()->user()->update([
                    "name"=>$request->name , 
                    "email"=>$request->email , 
                    "password"=>Hash::make($request->password) , 
                    "image"=>$image 
                ]) ; 
                return redirect(route("todo.index")) ; 
            }
            else
            {
                auth()->user()->update([
                    "name"=>$request->name , 
                    "email"=>$request->email , 
                    "image"=>$image 
                ]) ; 
                return redirect(route("todo.index")) ; 
            }
        }
        else 
        {
            
            if($request->password !=null)
            {
                auth()->user()->update([
                    "name"=>$request->name , 
                    "email"=>$request->email , 
                    "password"=>Hash::make($request->password)  
                    
                ]) ; 
                return redirect(route("todo.index")) ; 
            }
            else
            {
                auth()->user()->update([
                    "name"=>$request->name , 
                    "email"=>$request->email 
                    
                ]) ; 
                return redirect(route("todo.index")) ; 
            }
        
        // }
    }
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
}
