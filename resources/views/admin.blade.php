@extends('layouts.app')

@section('content')
    @if (!empty(Auth::id()))
    
        @foreach($users as $user)
        <form method="POST">
            @csrf
            <user-component v-bind:username="'{{ $user->name }}'" v-bind:permission="'{{ $user->permission }}'" v-bind:id="{{ $user->id }}"></user-component> 
        </form>
        @endforeach
    
    @endif
@endsection
