@extends('layouts.app')

@section('content')


@if (!empty(Auth::id()))

@foreach($wishes as $wish)
    {{-- <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $wish->wishname }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $wish->wishtext }}</h6>
            <a href="{!! $wish->wishlink !!}" class="card-text">{{ $wish->wishlink }}</a>
            <h6 class="card-subtitle mb-2 text-muted">User id = {{ $wish->user_id }}</h6>
        </div>
    </div> --}}
    <wish-component v-bind:wishname="'{{ $wish->wishname }}'" v-bind:wishtext="'{{ $wish->wishtext }}'" v-bind:wishlink="'{{ $wish->wishlink }}'" v-bind:username="'{{ $wish->user_id }}'"></wish-component>
@endforeach
<div class="container-fluid" style="margin-top: 4rem">
    <div role="tabpanel" class="tab-pane mt-4" id="wishes">
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
            <button type="submit" name="submit-wish" value="submit-wish" class="btn btn-primary mt-4">Voeg wish toe</button>
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