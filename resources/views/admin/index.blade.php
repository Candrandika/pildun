@extends('layout.admin-layout')

@section('title', 'Dashboard Admin')

@section('content')
    @inject('carbon', 'Carbon\Carbon')

    <div class="container mt-4">
        <div class="row">
            <div class="col-4">
                <div class="card bg-danger border-0 text-light p-3">
                    <div class="d-flex justify-content-between">
                        <div class="text-light fw-bold">Jumlah Tim</div>
                        <div class="text-light">{{ $team_count }}</div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card bg-danger border-0 text-light p-3">
                    <div class="d-flex justify-content-between">
                        <div class="text-light fw-bold">Jumlah Pemain</div>
                        <div class="text-light">{{ $player_count }}</div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card bg-danger border-0 text-light p-3">
                    <div class="d-flex justify-content-between">
                        <div class="text-light fw-bold">Jumlah Pertandingan</div>
                        <div class="text-light">{{ $schedule_count }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title fs-5 fw-bold">Data Pertandingan Terbaru</div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Grup</th>
                            <th scope="col">Tim 1</th>
                            <th scope="col">Tim 2</th>
                            <th scope="col">Waktu</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach ($match as $m)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $m->group }}</td>
                                <td>{{ $m->team1->name }}</td>
                                <td>{{ $m->team2->name }}</td>
                                <td>{{ $m->time < now() ? $carbon->parse($m->time)->diffForHumans() : $carbon->parse($m->time)->isoFormat('dddd, DD MM YYYY - HH:mm') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
        <div class="my-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title fs-5 fw-bold">Data Tim</div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Grup</th>
                            <th scope="col">Nama Tim</th>
                            <th scope="col">Nama Kapten</th>
                            <th scope="col">Nama Pelatih</th>
                            <th scope="col">Jumlah Pemain</th>
                            <th scope="col">Jumlah Pelatih</th>
                            <th scope="col">Gol <i class="fa-solid fa-futbol"></i></th>
                            <th scope="col">Kartu Kuning <i class="fa-solid fa-square text-warning"></i></th>
                            <th scope="col">Kartu Merah <i class="fa-solid fa-square text-danger"></i></th>
                          </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach ($teams as $team)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $team->group }}</td>
                                <td>{{ $team->name }}</td>
                                <td>{{ $team->captain ? $team->captain->name : '-- belum ditentukan --' }}</td>
                                <td>{{ $team->main_coach ? $team->main_coach->name : '-- belum ditentukan --' }}</td>
                                <td>{{ $team->player->count() }}</td>
                                <td>{{ $team->coach->count() }}</td>
                                <td>{{ $team->goal->count() }}</td>
                                <td>{{ $team->yellow->count() }}</td>
                                <td>{{ $team->red->count() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection