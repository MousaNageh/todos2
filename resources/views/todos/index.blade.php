@extends('layouts.app')
@section('content')
    <div class="row">
        @foreach ($todos as $todo)
        <div class="col-lg-4  ">
            <div class="overflow-hidden  m-4  @if ($todo->complete==1)todo-completed  @endif">
                <div class="card " style="width:100%">
                    <img class="card-img-top" src="storage/{{$todo->image}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$todo->title}}</h5>
                        
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">cretated : {{$todo->created_at}}</li>
                        <li class="list-group-item">updated : {{$todo->updated_at }}</li>
                        
                    </ul>
                    <div class="card-body">
                        <a href="{{route("todo.edit",$todo->id)}}" class=" btn btn-sm btn-success">edit </a>
                        
                        <a href="#" class=" btn btn-sm btn-danger" data-toggle="modal" data-target="#deletetodo{{$todo->id}}">delete</a>
                        <a href="{{route("todo.show",$todo->id)}}" class=" btn btn-sm btn-info">view</a>
                        @if ($todo->complete==0)
                        <a href="{{route("todo.complete",$todo->id)}}" class=" btn btn-sm btn-primary">complete</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
            <!-- Modal -->
        <div class="modal fade" id="deletetodo{{$todo->id}}" tabindex="-1" role="dialog" aria-labelledby="deletetodo{{$todo->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="deletetodo{{$todo->id}}Label">delete {{$todo->title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    are you sure you wanna to delete this todo
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="{{route("todo.destroy",$todo->id)}}" style="display:inline" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="delete" class="btn btn-danger ">
                </form>
                </div>
            </div>
            </div>
        </div>
        @endforeach
        
    </div>
    <div class="ml-4">
        {{$todos->links()}}
    </div>
<a href="{{route("todo.create")}}" class="btn btn-success m-4"> create todos</a> 

@endsection
@section('css')
<style>
    .todo-completed{
        border: 2px solid #00ff40
    }
</style>
@endsection
