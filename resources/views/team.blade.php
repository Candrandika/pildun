@extends('layout.layout')

@section('title', 'Team')

@section('content')
    <div class="text-center h2 fw-bold my-4">
        Tim di Piala Dunia
    </div>
    <div class="container">
        <div class="row">
            @foreach ($teams as $team)
            <div class="col-sm-6 col-md-4 col-lg-4 my-2">
                <div class="card p-1">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <a href="/team/{{ $team->name }}"><img src="{{ $team->image }}" alt="{{ $team->name }}" class="border" height="100px"></a>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <a href="/team/{{ $team->name }}" class="fw-bold text-dark" style="text-decoration:none;">{{ $team->name }}</a>
                            <div>
                                Pemain: {{ $team->player->count() }} | Pelatih: {{ $team->coach->count() }}
                            </div>
                            <div class="text-truncate">
                                Kapten: {{ $team->captain ? $team->captain->name : '-belum dipilih-' }}
                            </div>
                            <div class="text-truncate">
                                Pelatih: {{ $team->main_coach ? $team->main_coach->name : '-belum dipilih-' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection