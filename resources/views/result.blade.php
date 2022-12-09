@extends('layout.layout')

@section('title', 'Jadwal')

@section('content')
    @inject('carbon', 'Carbon\Carbon')

    <div class="text-center h2 fw-bold my-4">
        Hasil Piala Dunia
    </div>
    <div class="container">
        <div class="row">
            @foreach ($results as $res)
            <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                <div class="card p-2 px-auto">
                    <div class="row border-bottom">
                        <div class="col-12 text-center">Group {{ $res->group }}</div>
                        <div class="col-5 d-flex flex-column" style="place-items: center; place-content: center;">
                            <img src="{{ $res->team1->image }}" class="border w-50" alt="{{ $res->team1->name }}">
                            <div class="fw-bold text-center">{{ $res->team1->name }}</div>
                            <div class="fw-bold h2">{{ $res->score_1 }}</div>
                        </div>
                        <div class="col-2 text-center h3 d-flex" style="place-items:  center; place-content: center;">VS</div>
                        <div class="col-5 d-flex flex-column" style="place-items: center; place-content: center;">
                            <img src="{{ $res->team2->image }}" class="border w-50" alt="{{ $res->team2->name }}">
                            <div class="fw-bold text-center">{{ $res->team2->name }}</div>
                            <div class="fw-bold h2">{{ $res->score_2 }}</div>
                        </div>
                    </div>
                    <div class="row my-2">
                        @php
                            $goals1 = App\Models\Goal::where('schedule_id', $res->id)->where('team_id', $res->team_1)->get();
                            $reds1 = App\Models\Red::where('schedule_id', $res->id)->where('team_id', $res->team_1)->get();
                            $yellows1 = App\Models\Yellow::where('schedule_id', $res->id)->where('team_id', $res->team_1)->get();
                            $goals2 = App\Models\Goal::where('schedule_id', $res->id)->where('team_id', $res->team_2)->get();
                            $reds2 = App\Models\Red::where('schedule_id', $res->id)->where('team_id', $res->team_2)->get();
                            $yellows2 = App\Models\Yellow::where('schedule_id', $res->id)->where('team_id', $res->team_2)->get();
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
            @endforeach
        </div>
    </div>
@endsection