@extends('layout.layout')

@section('title', 'Team')

@section('content')
    <div class="text-center h2 fw-bold my-4">
        Tim Mendapat Kartu Merah Terbanyak
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
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">Pilih Grup: </button>
                <ul class="dropdown-menu">
                    <li><a href="/top-red" class="dropdown-item">Semua</a></li>
                    @foreach ($group as $g)
                        <li><a href="/top-red?group={{ $g->group }}" class="dropdown-item">{{ $g->group }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="container my-2">
        @php $i = 1; @endphp
        @foreach ($team as $t)
            <div class="card my-2 py-2 px-3">
                <div class="row align-items-center">
                    <div class="col-1 border-end">{{ $i++ }}</div>
                    <div class="col-1">
                        <img src="/{{ $t->image }}" alt="{{ $t->name }}" class="w-100 border">
                    </div>
                    <div class="col-2 fw-bold">{{ $t->name }}</div>
                    <div class="col-3">Pelatih: {{ $t->main_coach ? $t->main_coach->name : '-belum diinputkan-' }}</div>
                    <div class="col-3">Kapten: {{ $t->captain ? $t->captain->name : '-belum diinputkan-' }}</div>
                    <div class="col-2">Kartu Merah <i class="fa-solid fa-square text-danger"></i>: {{ $t->red_count }}</div>
                </div>
            </div>
        @endforeach
    </div>
@endsection