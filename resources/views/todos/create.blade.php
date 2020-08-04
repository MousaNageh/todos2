@extends('layouts.app')

@section('content')
<div class="card"> 
    <div class="card-header" >
        @isset($todo)
        <h3>edit todo</h3>
        @else 
        <h3>create todo</h3>
        @endisset
        
    </div>
    <div class="crad-body create-todo" style="padding:20px">
        <form action="@isset($todo) {{route("todo.update",$todo->id)}}@else {{route("todo.store")}} @endisset" method="POST" enctype="multipart/form-data">
            @csrf 
            @isset($todo)
            @method("PUT") 
            @endisset
            <div class="form-group">
                <label for="title" class="font-weight-bold" >title</label>
                <input type="text" name="title"  class="form-control" value="@isset($todo){{$todo->title}}@endisset"> 
            </div>
            <div class="form-group">
                <label for="content" class="font-weight-bold" >content</label>
                <textarea class="form-control" name="content"  rows="3">@isset($todo){{$todo->content}}@endisset</textarea>
            </div>
            <div class="form-group">
                <label for="image" class="font-weight-bold" >image</label>
                <input type="file" name="image"  class="form-control"> 
            </div>
            <input type="submit" value="@isset($todo) edit @else create @endisset" class="btn btn-success">
        </form>
    </div>
</div>

@endsection