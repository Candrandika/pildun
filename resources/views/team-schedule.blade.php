@extends('layout.layout')

@section('title', 'Team')

@section('content')

@inject('carbon', 'Carbon\Carbon')
    <div class="text-center h2 fw-bold my-4">
        Jadwal Tim {{ $tm }}
    </div>
    <div class="my-2 d-flex justify-content-center">
        <a href="/team/{{ $tm }}" class="btn btn-danger mx-2">Pertandingan</a>
        <a href="/team/{{ $tm }}/player" class="btn btn-danger mx-2">Pemain</a>
        <a href="/team/{{ $tm }}/coach" class="btn btn-danger mx-2">Pelatih</a>
    </div>
    <div class="container my-2">
        <div class="row">
            @foreach ($schedule as $sch)
            @if ($sch->time < now())
            <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                <div class="card p-2 px-auto">
                    <div class="row border-bottom">
                        <div class="col-12 text-center">Group {{ $sch->group }}</div>
                        <div class="col-5 d-flex flex-column" style="place-items: center; place-content: center;">
                            <img src="/{{ $sch->team1->image }}" class="border w-50" alt="{{ $sch->team1->name }}">
                            <div class="fw-bold text-center">{{ $sch->team1->name }}</div>
                            <div class="fw-bold h2">{{ $sch->score_1 }}</div>
                        </div>
                        <div class="col-2 text-center h3 d-flex" style="place-items:  center; place-content: center;">VS</div>
                        <div class="col-5 d-flex flex-column" style="place-items: center; place-content: center;">
                            <img src="/{{ $sch->team2->image }}" class="border w-50" alt="{{ $sch->team2->name }}">
                            <div class="fw-bold text-center">{{ $sch->team2->name }}</div>
                            <div class="fw-bold h2">{{ $sch->score_2 }}</div>
                        </div>
                        <div class="col-12 text-center fw-bold">
                            {{ $carbon->parse($sch->time)->diffForHumans() }}
                        </div>
                    </div>
                    <div class="row my-2">
                        @php
                            $goals1 = App\Models\Goal::where('schedule_id', $sch->id)->where('team_id', $sch->team_1)->get();
                            $reds1 = App\Models\Red::where('schedule_id', $sch->id)->where('team_id', $sch->team_1)->get();
                            $yellows1 = App\Models\Yellow::where('schedule_id', $sch->id)->where('team_id', $sch->team_1)->get();
                            $goals2 = App\Models\Goal::where('schedule_id', $sch->id)->where('team_id', $sch->team_2)->get();
                            $reds2 = App\Models\Red::where('schedule_id', $sch->id)->where('team_id', $sch->team_2)->get();
                            $yellows2 = App\Models\Yellow::where('schedule_id', $sch->id)->where('team_id', $sch->team_2)->get();
                        @endphp

                        <div class="col-12 fw-bold text-center">Statistik</div>
                        <div class="col-12 row mx-auto">
                            <div class="col-4 text-center">
                                @foreach($goals1 as $goal)
                                ({{ $goal->player->number }}), 
                                @endforeach
                                @if ($goals1->isEmpty())
                                    0
                                @endif
                            </div>
                            <div class="col-4 text-center">- goal <i class="fa-solid fa-futbol"></i> -</div>
                            <div class="col-4 text-center">
                                @foreach($goals2 as $goal)
                                ({{ $goal->player->number }}),
                                @endforeach
                                @if ($goals2->isEmpty())
                                    0
                                @endif
                            </div>
                        </div>
                        <div class="col-12 row mx-auto">
                            <div class="col-4 text-center">
                                @foreach($yellows1 as $goal)
                                ({{ $goal->player->number }}), 
                                @endforeach
                                @if ($yellows1->isEmpty())
                                    0
                                @endif
                            </div>
                            <div class="col-4 text-center">- Kartu kuning <i class="fa-solid fa-square text-warning"></i> -</div>
                            <div class="col-4 text-center">
                                @foreach($yellows2 as $goal)
                                ({{ $goal->player->number }}),
                                @endforeach
                                @if ($yellows2->isEmpty())
                                    0
                                @endif
                            </div>
                        </div>
                        <div class="col-12 row mx-auto">
                            <div class="col-4 text-center">
                                @foreach($reds1 as $goal)
                                ({{ $goal->player->number }}), 
                                @endforeach
                                @if ($reds1->isEmpty())
                                    0
                                @endif
                            </div>
                            <div class="col-4 text-center">- Kartu merah <i class="fa-solid fa-square text-danger"></i> -</div>
                            <div class="col-4 text-center">
                                @foreach($reds2 as $goal)
                                ({{ $goal->player->number }}),
                                @endforeach
                                @if ($reds2->isEmpty())
                                    0
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                <div class="card p-2 px-auto">
                    <div class="row">
                        <div class="col-12 text-center">Group {{ $sch->group }}</div>
                        <div class="col-5 d-flex flex-column" style="place-items: center; place-content: center;">
                            <img src="/{{ $sch->team1->image }}" class="border w-50" alt="{{ $sch->team1->name }}">
                            <div class="fw-bold text-center">{{ $sch->team1->name }}</div>
                        </div>
                        <div class="col-2 text-center h3 d-flex" style="place-items:  center; place-content: center;">VS</div>
                        <div class="col-5 d-flex flex-column" style="place-items: center; place-content: center;">
                            <img src="/{{ $sch->team2->image }}" class="border w-50" alt="{{ $sch->team2->name }}">
                            <div class="fw-bold text-center">{{ $sch->team2->name }}</div>
                        </div>
                        <div class="col-12">
                            @if ($sch->time > now())
                            <div class="text-center fw-bold">
                                {{ $carbon->parse($sch->time)->isoFormat('DD-MM-YYYY') }}
                            </div>
                            <div class="text-center">
                                {{ $carbon->parse($sch->time)->isoFormat('HH:mm') }}
                            </div>
                            @else
                                <div class="text-center fw-bold">
                                    {{ $carbon->parse($sch->time)->diffForHumans() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
@endsection