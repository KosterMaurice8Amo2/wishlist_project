@extends('layouts.app')

@section('content')
<div class="container">

@if (!empty(Auth::id()))
@foreach($wishes as $wish)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $wish->wishname }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $wish->wishtext }}</h6>
            <a href="{!! $wish->wishlink !!}" class="card-text">{{ $wish->wishlink }}</a>
            <h6 class="card-subtitle mb-2 text-muted">User id = {{ $wish->user_id }}</h6>
        </div>
    </div>
@endforeach
</div>
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
    <div class="input-group mb-3">
        <span>Login om de wishes te bekijken / aan te maken</span>
    </div>
@endif
@endsection