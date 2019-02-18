@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Hi mom!</h1>
    <form method="POST" action="/todo/{{Auth::user()->id}}">
    @csrf
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" /><br/>
    <input type="text" name="name" /><br/>
    <input type="text" name="description" /><br/>
    <input type="date" name="complete-by" /><br/>
    <input type="submit" />
    </form>
</div>
@endsection