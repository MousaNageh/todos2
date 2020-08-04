@extends('layouts.app') 
@section('content')
    <div class="card">
        
        <div class="card-header"><h3>Edit profile</h3></div>
        <div class="card-body edit-profile"> 
            <form action="{{route("user.update",$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="name" class="font-weight-bold"> name</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email" class="font-weight-bold"> email</label>
                    <input type="email" name="email" value="{{$user->email}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password" class="font-weight-bold"> password [optial]</label>
                    <input type="password" name="password"  class="form-control">
                </div>
                <div class="form-group">
                    @if ($user->image)
                    <label for="image" class="font-weight-bold"> <img class="card-img-top" src="{{asset("storage/".auth()->user()->image)}}" alt="Card image cap" style="width: 40px ; height: 40px ; border-radius: 50% ; ">image [optinal]</label>
                    @else
                    <label for="image" class="font-weight-bold"> <img src="{{ Gravatar::src(auth()->user()->email) }}" alt="" style="width: 40px ; height: 40px ; border-radius: 50% ; "> image [optinal]</label>
                    @endif
                    <input type="file" name="image"  class="form-control">
                </div>
                <input type="submit" value="save" class="btn btn-success">
                
            </form>
        </div>
        <div class="view-image text-center my-5" style="width: 70% ; margin: 10px auto">
            @if (auth()->user()->image)
                <img class="card-img-top user-image" src="{{asset("storage/".auth()->user()->image)}}" alt="Card image cap" style="border-radius: 20px ; ">
                @else
                    <img src="{{ Gravatar::src(auth()->user()->email) }}" alt="" > 
                @endif
        </div>
    </div>
@endsection
@section('css')
    <style>
        .edit-profile{
            padding: 20px ; 
        }
    </style>
@endsection