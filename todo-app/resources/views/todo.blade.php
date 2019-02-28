@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Todo Items</h1>
    <hr/>
    <h2>Create New Item</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <h2>Errors:</h2>
            @foreach($errors->all() as $item)
                <p>{{ $item }}</p>
            @endforeach
        </div>
    @endif
    <form class="form-inline" method="POST" action="{{ route('todo.insert', Auth::user()->id) }}">
    @csrf
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
    <div class="form-group">
        <label for="name">Todo Name:</label>
        <input type="text" name="name" class="form-control mx-2"/>
    </div>
    <div class="form-group">
        <label for="description">Todo Description:</label>
        <input type="text" name="description" class="form-control mx-2"/>
    </div>
    <div class="form-group">
        <label for="complete-by">Todo Due Date:</label>
        <input type="date" name="complete-by" class="form-control mx-2"/>
    </div>
    <input type="submit" class="btn btn-secondary"/>
    </form>

    
    <hr/>
    <h2>Existing Items</h2>
    @foreach($items as $item)
        <div class="card">
            <div class="card-body">
                <form class="form-inline" method="POST" action="{{ route('todo.update', Auth::user()->id) }}">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}" />

                    <label for="name">Todo Name:</label>
                    <input type="text" name="name" value="{{$item->name}}" class="form-control mx-2"/><br/>

                    <label for="description">Todo Description:</label>
                    <input type="text" name="description" value="{{$item->description}}" class="form-control mx-2"/><br/>

                    <label for="complete-by">Todo Due Date:</label>
                    <input type="date" name="complete-by" value="{{ $item->{'complete-by'} }}" class="form-control mx-2"/><br/>

                    <input type="submit" class="btn btn-secondary mx-2" value="Save"/>

                    
                </form>
                <br />
                <form method="POST" action="{{ route('todo.delete', [Auth::user()->id, $item->id]) }}" >
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-danger btn-lg btn-block" value="Delete"/>
                </form>
            </div>
        </div>
    @endforeach
    
</div>
@endsection