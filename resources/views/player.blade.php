@extends('layout.layout')

@section('title', 'Team')

@section('content')
    <div class="text-center h2 fw-bold my-4">
        Pemain Tim {{ $tm }}
    </div>
    <div class="my-2 d-flex justify-content-center">
        <a href="/team/{{ $tm }}" class="btn btn-danger mx-2">Pertandingan</a>
        <a href="/team/{{ $tm }}/player" class="btn btn-danger mx-2">Pemain</a>
        <a href="/team/{{ $tm }}/coach" class="btn btn-danger mx-2">Pelatih</a>
    </div>
    <div class="container my-2">
        @foreach($player as $p)
        <div class="card mt-3">
            <div class="row p-3">
                <div class="col-1">{{ $p->number }}</div>
                <div class="col-4 fw-bold">{{ $p->name }} ({{ $p->alias }})</div>
                <div class="col-2">{{ $p->position }}</div>
                <div class="col-5">Goal <i class="fa-solid fa-futbol"></i> : {{ $p->goal->count() }} | Kartu Kuning <i class="fa-solid fa-square text-warning"></i> : {{ $p->yellow->count() }} | Kartu Merah <i class="fa-solid fa-square text-danger"></i> : {{ $p->red->count() }}</div>
            </div>
        </div>
        @endforeach
    </div>
@endsection