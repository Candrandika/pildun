@extends('layout.layout')

@section('title', 'Team')

@section('content')
    <div class="text-center h2 fw-bold my-4">
        Pelatih Tim {{ $tm }}
    </div>
    <div class="my-2 d-flex justify-content-center">
        <a href="/team/{{ $tm }}" class="btn btn-danger mx-2">Pertandingan</a>
        <a href="/team/{{ $tm }}/player" class="btn btn-danger mx-2">Pemain</a>
        <a href="/team/{{ $tm }}/coach" class="btn btn-danger mx-2">Pelatih</a>
    </div>
    <div class="container my-2">
        <div class="row">
            @foreach($coach as $c)
            <div class="col-6">
                <div class="card mt-3">
                    <div class="row p-3">
                        <div class="col-7 fw-bold">{{ $c->name }} ({{ $c->alias }})</div>
                        <div class="col-5">{{ $c->position }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection