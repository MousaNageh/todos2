@extends('layouts.app')

@section('content')

<a href="{{route("todo.create")}}" class="btn btn-success"> create todos</a> 
<a href="{{route("todo.index")}}" class="btn btn-success"> view my todos</a> 
@endsection
