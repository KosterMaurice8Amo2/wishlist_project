@extends('layouts.app')

@section('content')
    @php
        $currentUser = Auth::user();
    @endphp
    @if (!empty(Auth::id()))
        @if ($currentUser->permission == "admin")
            @foreach($users as $user)

            <form method="POST" enctype="multipart/form-data">
                @csrf
                <user-component v-bind:username="'{{ $user->name }}'" v-bind:permission="'{{ $user->permission }}'" v-bind:id="{{ $user->id }}"></user-component> 
            </form>
            @endforeach
            {{-- spacer --}}
            <div class="mb-2 mt-2"></div>
            <hr class="bg-light">
            {{-- spacer --}}
            <div class="mb-2 mt-2"></div>
            <h4 class="mb-2 text-white">Wishes</h4>
            @foreach($wishes as $wish)
                @foreach($users as $user)
                    @if ($wish->user_id == $user->id);
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <wish-component v-bind:id="{{ $wish->id }}" v-bind:wishname="'{{ $wish->wishname }}'" v-bind:wishtext="'{{ $wish->wishtext }}'" v-bind:wishlink="'{{ $wish->wishlink }}'" v-bind:wishprice="'{{ $wish->wishprice }}'" v-bind:wishimage="'{{ $wish->wishimage }}'" v-bind:username="'{{ $user->name }}'" v-bind:editable="true"></wish-component>
                    </form>
                    @endif
                @endforeach
            @endforeach
        @else
        <script>window.location = "/home";</script>
        @endif
    @endif
@endsection
