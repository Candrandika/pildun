@extends('layout.admin-layout')

@section('title', 'Jadwal')

@section('content')
    @inject('carbon', 'Carbon\Carbon')

    <div class="modal fade" tabindex="-1" id="addSchedule">
        <div class="modal-dialog">
            <form action="/admin/schedule" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Tambah Pertandigan</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="time" class="form-label">Waktu</label>
                        <input type="datetime-local" class="form-control" name="time" id="time">
                    </div>
                    <div class="mb-3">
                        <label for="group" class="form-label">Group</label>
                        <select class="form-select" id="group" name="group">
                            <option selected>Pilih Group</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="round" class="form-label">Babak</label>
                        <select class="form-select" id="round" name="round">
                            <option selected>Pilih babak</option>
                            <option value="32 besar">32 besar</option>
                            <option value="16 besar">16 besar</option>
                            <option value="8 besar">8 besar</option>
                            <option value="Semi Final">Semi Final</option>
                            <option value="Final">Final</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="team_1" class="form-label">Team 1</label>
                        <select class="form-select" id="team_1" name="team_1">
                            <option selected>Pilih tim</option>
                            @foreach ($team as $t)
                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="team_2" class="form-label">Team 2</label>
                        <select class="form-select" id="team_2" name="team_2">
                            <option selected>Pilih tim</option>
                            @foreach ($team as $t)
                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="note" class="form-label">Catatan</label>
                        <textarea class="form-control" id="note" placeholder="Catatan" name="note"></textarea>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    @foreach ($schedule as $sch)
    <div class="modal fade" tabindex="-1" id="editSchedule{{ $sch->id }}">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $sch->id }}/edit" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Ubah Pertandigan "{{ $sch->name }}"</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="time" class="form-label">Waktu</label>
                        <input type="datetime-local" class="form-control" name="time" id="time" value="{{ $sch->time }}">
                    </div>
                    <div class="mb-3">
                        <label for="group" class="form-label">Group</label>
                        <select class="form-select" id="group" name="group">
                            <option value="A" {{ $sch->group == "A" ? 'selected' : '' }}>A</option>
                            <option value="B" {{ $sch->group == "B" ? 'selected' : '' }}>B</option>
                            <option value="C" {{ $sch->group == "C" ? 'selected' : '' }}>C</option>
                            <option value="D" {{ $sch->group == "D" ? 'selected' : '' }}>D</option>
                            <option value="E" {{ $sch->group == "E" ? 'selected' : '' }}>E</option>
                            <option value="F" {{ $sch->group == "F" ? 'selected' : '' }}>F</option>
                            <option value="G" {{ $sch->group == "G" ? 'selected' : '' }}>G</option>
                            <option value="H" {{ $sch->group == "H" ? 'selected' : '' }}>H</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="round" class="form-label">Babak</label>
                        <select class="form-select" id="round" name="round">
                            <option value="32 besar" {{ $sch->round == '32 besar' ? 'selected' : '' }}>32 besar</option>
                            <option value="16 besar" {{ $sch->round == '16 besar' ? 'selected' : '' }}>16 besar</option>
                            <option value="8 besar" {{ $sch->round == '8 besar' ? 'selected' : '' }}>8 besar</option>
                            <option value="Semi Final" {{ $sch->round == 'Semi Final' ? 'selected' : '' }}>Semi Final</option>
                            <option value="Final" {{ $sch->round == 'Final' ? 'selected' : '' }}>Final</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="team_1" class="form-label">Team 1</label>
                        <select class="form-select" id="team_1" name="team_1">
                            <option selected>Pilih tim</option>
                            @foreach ($team as $t)
                            <option value="{{ $t->id }}" {{ $sch->team_1 == $t->id ? 'selected' : '' }}>{{ $t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="team_2" class="form-label">Team 2</label>
                        <select class="form-select" id="team_2" name="team_2">
                            <option selected>Pilih tim</option>
                            @foreach ($team as $t)
                            <option value="{{ $t->id }}" {{ $sch->team_2 == $t->id ? 'selected' : '' }}>{{ $t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="note" class="form-label">Catatan</label>
                        <textarea class="form-control" id="note" placeholder="Catatan" name="note" value="{{ $sch->note }}"></textarea>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Ubah</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="deleteSchedule{{ $sch->id }}">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $sch->id }}/delete" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Hapus Pertandigan</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus pertandingan "{{ $sch->name }}"
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach

    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-4 text-center h2 fw-bold my-4">
            Jadwal Pertandingan
        </div>
        <div class="col-4 d-flex justify-content-center align-items-center">
            <div>
                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addSchedule">+tambah pertandingan</button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($schedule as $sch)
            @if ($sch->time < now())
            <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                <div class="card">
                    <a href="/admin/schedule/{{ $sch->id }}" class="card-body p-2 px-auto text-dark" style="text-decoration: none;">
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
                    </a>
                    <div class="card-footer text-center">
                        <div class="dropdown">
                            <div class="button" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis"></i>
                            </div>
                            <ul class="dropdown-menu">
                                <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editSchedule{{ $sch->id }}">Ubah Pertandingan</button></li>
                                <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteSchedule{{ $sch->id }}">Hapus Pertandingan</button></li>
                                <li><a href="/admin/schedule/{{ $sch->id }}" class="dropdown-item">Detail Pertandingan</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                <div class="card">
                    <a href="/admin/schedule/{{ $sch->id }}" class="card-body p-2 px-auto text-dark" style="text-decoration: none;">
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
                    </a>
                    <div class="card-footer text-center">
                        <div class="dropdown">
                            <div class="button" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis"></i>
                            </div>
                            <ul class="dropdown-menu">
                                <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editSchedule{{ $sch->id }}">Ubah Pertandingan</button></li>
                                <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteSchedule{{ $sch->id }}">Hapus Pertandingan</button></li>
                                <li><a href="/admin/schedule/{{ $sch->id }}" class="dropdown-item">Detail Pertandingan</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
@endsection