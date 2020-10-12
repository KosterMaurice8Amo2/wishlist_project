@extends('layouts.app')

@section('content')
    <main role="main" class="inner cover text-white">
        <div >
            <h2 class="cover-heading mb-2">Zie hier de wensen van andere gebruikers:</h2>
            @foreach($wishes as $wish)
                @foreach($users as $user)
                    @if ($wish->user_id == $user->id)
                        <wish-component v-bind:wishname="'{{ $wish->wishname }}'" v-bind:wishtext="'{{ $wish->wishtext }}'" v-bind:wishlink="'{{ $wish->wishlink }}'" v-bind:wishprice="'{{ $wish->wishprice }}'" v-bind:wishimage="'{{ asset('storage/images/'.$wish->wishimage) }}'" v-bind:username="'{{ $user->name }}'" v-bind:editable="false"></wish-component>
                    @endif
                @endforeach
            @endforeach
        </div>
    </main>
 
@endsection
