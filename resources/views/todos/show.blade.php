@extends('layouts.app')

@section('content')
<div class="card"> 
    <div class="card-header"> 
        <h3 class="text-center">{{$todo->title}}</h3> 
    </div>
    <div class="card-body">
        <div class="disply-todo-image">
            <img class="card-img-top" src="{{asset("storage/$todo->image")}}" alt="Card image cap">
        </div> 
        <h5 class="text-center my-5 content" class="h4">
            {{$todo->content}}
        </h5>
        @if ($todo->complete == 0)
            <div class="alert alert-danger text-center"> <h5>not completed</h5> </div>
        @else
        <div class="alert alert-success text-center"> <h5>completed</h5> </div>
        @endif
        <h6> created at :  <strong>{{  $todo->created_at }}</strong></h6>
        <h6>updated at : <strong>{{$todo->updated_at }}</strong></h6>
        <a href="{{URL::previous()}}" class="btn btn-primary btn-lg my-3">back</a>
    </div>
    
</div>
@endsection
@section('css')
<style>
.disply-todo-image{
    width: 60% ; 
    margin: 5px auto ; 
    padding: 2px  ; 
    border:1px solid #EEE ; 
    border-radius: 20px ; 
}
.disply-todo-image img{
    width: 100%; 
    height: 100%; 
    border-radius: 20px ; 
}
.content{
    padding: 20px ; 
    border: 2px solid #EEE ; 
    border-radius: 15px ; 
    box-shadow: 2px 2px #DDD ; 
}


</style>    
@endsection
