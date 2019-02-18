@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Todo Items</h1>
    @foreach($items as $item)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$item->name}}</h5>
                <p class="card-text">{{$item->description}}</p>
                <form method="POST" action="/todo/{{Auth::user()->id}}/{{$item->id}}" >
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-danger" value="X"/>
                </form>
            </div>
        </div>
    @endforeach
    <form method="POST" action="/todo/{{Auth::user()->id}}">
    @csrf
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" /><br/>
    <div class="form-group">
        <label for="name">Todo Name:</label>
        <input type="text" name="name" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="description">Todo Description:</label>
        <input type="text" name="description" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="complete-by">Todo Due Date:</label>
        <input type="date" name="complete-by" class="form-control"/>
    </div>
    <input type="submit" class="btn btn-secondary"/>
    </form>
</div>
@endsection