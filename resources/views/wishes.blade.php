@extends('layouts.app')

@section('content')

@if (!empty($error))
    <h4 class="text-white mb-1 mt-1">{{ $error }} <span class="badge badge-danger">Error</span></h4>
@endif

@php
    $currentUser = Auth::user();
@endphp

@if (!empty(Auth::id()))
    @foreach($wishes as $wish)
        @foreach($users as $user)
            @if ($wish->user_id == Auth::id())
                @if ($wish->user_id == $user->id)
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <wish-component v-bind:id="{{ $wish->id }}" v-bind:wishname="'{{ $wish->wishname }}'" v-bind:wishtext="'{{ $wish->wishtext }}'" v-bind:wishlink="'{{ $wish->wishlink }}'" v-bind:wishprice="'{{ $wish->wishprice }}'" v-bind:wishimage="'{{ $wish->wishimage }}'" v-bind:username="'{{ $user->name }}'" v-bind:editable="true"></wish-component>
                    </form>
                @endif
            @endif
        @endforeach
    @endforeach
<div class="container-fluid mb-4" style="margin-top: 4rem">
    <hr class="bg-light">
    <div role="tabpanel" class="tab-pane mt-4 " id="wishes">
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Wish name</span>
                </div>
                <input type="text" name="wishname" class="form-control" aria-label="Sizing example input"
                       aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Wish text</span>
                </div>
                <textarea name="wishtext" class="form-control" aria-label="With textarea"></textarea>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Wish link</span>
                </div>
                <input type="text" class="form-control" name="wishlink" aria-label="Sizing example input"
                       aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Wish price</span>
                </div>
                <input type="text" class="form-control" name="wishprice" aria-label="Sizing example input"
                       aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Wish image</span>
                </div>
                <input type="file" class="form-control" name="wishimage" aria-label="Sizing example input"
                       aria-describedby="inputGroup-sizing-default">
            </div>
            <button type="submit" name="submit-wish" value="submit-wish" class="btn btn-primary mt-4 text-white">Voeg wish toe</button>
        </form>
    </div>
</div>
@else
<main role="main" class="inner cover text-white">
    <div >
        <h1 class="cover-heading">U bent niet ingelogd</h1>
        <p class="lead">Registreer / login om de wishes te bekijken</p>
        <p class="lead"><a href="/login" class="btn btn-lg btn-secondary">Login</a><a>&nbsp;&nbsp;</a><a href="/register" class="btn btn-lg btn-secondary">Registreer</a></p>
    </div>
</main>
@endif
@endsection