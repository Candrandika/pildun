@extends('layout.admin-layout')

@section('title', 'Team')

@section('content')

    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-4 text-center h2 fw-bold my-4">
            Tim {{ $tm }}
        </div>
        <div class="col-4 d-flex justify-content-center align-items-center">
        </div>
    </div>
    <div class="my-2 d-flex justify-content-center">
        <a href="/admin/team/{{ $tm }}" class="btn btn-danger mx-2">Detail</a>
        <a href="/admin/team/{{ $tm }}/player" class="btn btn-danger mx-2">Pemain</a>
        <a href="/admin/team/{{ $tm }}/coach" class="btn btn-danger mx-2">Pelatih</a>
    </div>
    <div class="container my-2">
        <div class="card">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <img src="/{{ $team->image }}" class="w-100 border" alt="{{ $team->name }}">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="m-2">Nama Tim : {{ $team->name }}</div>
                    <div class="m-2">Pelatih Utama : {{ $team->main_coach ? $team->main_coach->name : '--belum diinputkan--' }}</div>
                    <div class="m-2">Kapten Tim : {{ $team->captain ? $team->captain->name : '--belum diinputkan--' }}</div>
                    <div class="m-2">Penghargaan : {{ $team->achievement ? $team->achievement : '--tidak ada penghargaan--' }}</div>
                    <div class="m-2">Catatan : {{ $team->note ? $team->note : '--tidak ada catatan--' }}</div>
                    <div class="m-2">Goal : {{ $team->goal->count() }} | Kartu Merah : {{ $team->red->count() }} | Kartu Kuning : {{ $team->yellow->count() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection