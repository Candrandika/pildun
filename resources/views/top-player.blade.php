@extends('layout.layout')

@section('title', 'Team')

@section('content')
    <div class="text-center h2 fw-bold my-4">
        Pemain Pencetak Gol Terbanyak
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="my-2 d-flex justify-content-center">
                <a href="/top-team" class="btn btn-danger mx-2">Top Team</a>
                <a href="/top-player" class="btn btn-danger mx-2">Top Player</a>
                <a href="/top-red" class="btn btn-danger mx-2">Top Red</a>
            </div>
        </div>
        <div class="col-2">
            <div class="dopdown-center my-2">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Pilih Negara: </button>
                <ul class="dropdown-menu">
                    <li><a href="/top-player" class="dropdown-item">Semua</a></li>
                    @foreach ($teams as $t)
                        <li><a href="/top-player?group={{ $t->name }}" class="dropdown-item">{{ $t->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    
    <div class="container my-2">
        @php $i = 1; @endphp
        @foreach ($player as $p)
            <div class="card my-2 py-2 px-3">
                <div class="row align-items-center">
                    <div class="col-1 border-end">{{ $i++ }}</div>
                    <div class="col-1">
                        <img src="/{{ $p->team->image }}" alt="{{ $p->team->name }}" class="w-100 border">
                    </div>
                    <div class="col-2">{{ $p->team->name }}</div>
                    <div class="col-4 fw-bold">{{ $p->name }}</div>
                    <div class="col-3">Pelatih: {{ $p->team->main_coach ? $p->team->main_coach->name : '-belum diinputkan-' }}</div>
                    <div class="col-1">Goal <i class="fa-solid fa-futbol"></i>: {{ $p->goal_count }}</div>
                </div>
            </div>
        @endforeach
    </div>
@endsection