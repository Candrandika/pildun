@extends('layout.admin-layout')

@section('title', 'Jadwal')

@section('content')
    @inject('carbon', 'Carbon\Carbon')

    {{-- Modal Goal --}}
    {{-- add --}}
    <div class="modal fade" tabindex="-1" id="addGoalTeam1">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $schedule->id }}/goal/" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Tambah Goal Tim {{ $schedule->team1->name }}</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="team" value="1">
                        <label for="player" class="form-label">Pencetak Goal</label>
                        <select class="form-select" required id="player" name="player">
                            <option selected>Pilih Pemain</option>
                            @foreach ($schedule->team1->player as $t)
                            <option value="{{ $t->id }}">{{ '('.$t->number.') '.$t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="addGoalTeam2">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $schedule->id }}/goal/" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Tambah Goal Tim {{ $schedule->team2->name }}</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="team" value="2">
                        <label for="player" class="form-label">Pencetak Goal</label>
                        <select class="form-select" required id="player" name="player">
                            <option selected>Pilih Pemain</option>
                            @foreach ($schedule->team2->player as $t)
                            <option value="{{ $t->id }}">{{ '('.$t->number.') '.$t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    {{-- edit --}}
    @foreach ($goal1 as $goal)
    <div class="modal fade" tabindex="-1" id="editGoal{{ $goal->id }}">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $schedule->id }}/goal/{{ $goal->id }}/edit" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Edit Goal dari {{ $goal->player->name }}</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="team" value="1">
                        <label for="player" class="form-label">Pencetak Goal</label>
                        <select class="form-select" required id="player" name="player">
                            @foreach ($schedule->team1->player as $t)
                            <option value="{{ $t->id }}" {{ $goal->player_id == $t->id ? 'selected' : '' }}>{{ '('.$t->number.') '.$t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Ubah</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
    @foreach ($goal2 as $goal)
    <div class="modal fade" tabindex="-1" id="editGoal{{ $goal->id }}">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $schedule->id }}/goal/{{ $goal->id }}/edit" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Edit Goal dari {{ $goal->player->name }}</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="team" value="2">
                        <label for="player" class="form-label">Pencetak Goal</label>
                        <select class="form-select" required id="player" name="player">
                            @foreach ($schedule->team2->player as $t)
                            <option value="{{ $t->id }}" {{ $goal->player_id == $t->id ? 'selected' : '' }}>{{ '('.$t->number.') '.$t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Ubah</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
    {{-- delete --}}
    @foreach ($goal1 as $goal)
    <div class="modal fade" tabindex="-1" id="deleteGoal{{ $goal->id }}">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $schedule->id }}/goal/{{ $goal->id }}/delete" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Hapus Goal</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus goal dari {{ $goal->player->name }}?
                    <input type="hidden" name="team" value="1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
    @foreach ($goal2 as $goal)
    <div class="modal fade" tabindex="-1" id="deleteGoal{{ $goal->id }}">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $schedule->id }}/goal/{{ $goal->id }}/delete" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Hapus Goal</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus goal dari {{ $goal->player->name }}?
                    <input type="hidden" name="team" value="2">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach


    {{-- Modal Yellow --}}
    {{-- add --}}
    <div class="modal fade" tabindex="-1" id="addYellowTeam1">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $schedule->id }}/yellow/" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Tambah Kartu Kuning Tim {{ $schedule->team1->name }}</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="team" value="1">
                        <label for="player" class="form-label">Pelanggar</label>
                        <select class="form-select" required id="player" name="player">
                            <option selected>Pilih Pemain</option>
                            @foreach ($schedule->team1->player as $t)
                            <option value="{{ $t->id }}">{{ '('.$t->number.') '.$t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="addYellowTeam2">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $schedule->id }}/yellow/" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Tambah Kartu Kuning Tim {{ $schedule->team2->name }}</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="team" value="2">
                        <label for="player" class="form-label">Pelanggar</label>
                        <select class="form-select" required id="player" name="player">
                            <option selected>Pilih Pemain</option>
                            @foreach ($schedule->team2->player as $t)
                            <option value="{{ $t->id }}">{{ '('.$t->number.') '.$t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    {{-- edit --}}
    @foreach ($yellow1 as $yellow)
    <div class="modal fade" tabindex="-1" id="editYellow{{ $yellow->id }}">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $schedule->id }}/yellow/{{ $yellow->id }}/edit" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Ubah Kartu Kuning dari {{ $yellow->player->name }}</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="team" value="1">
                        <label for="player" class="form-label">Pelanggar</label>
                        <select class="form-select" required id="player" name="player">
                            @foreach ($schedule->team1->player as $t)
                            <option value="{{ $t->id }}" {{ $yellow->player_id == $t->id ? 'selected' : '' }}>{{ '('.$t->number.') '.$t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Ubah</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
    @foreach ($yellow2 as $yellow)
    <div class="modal fade" tabindex="-1" id="editYellow{{ $yellow->id }}">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $schedule->id }}/yellow/{{ $yellow->id }}/edit" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Ubah Kartu Kuning dari {{ $yellow->player->name }}</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="team" value="2">
                        <label for="player" class="form-label">Pelanggar</label>
                        <select class="form-select" required id="player" name="player">
                            @foreach ($schedule->team2->player as $t)
                            <option value="{{ $t->id }}" {{ $yellow->player_id == $t->id ? 'selected' : '' }}>{{ '('.$t->number.') '.$t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Ubah</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
    {{-- delete --}}
    @foreach ($yellow1 as $yellow)
    <div class="modal fade" tabindex="-1" id="deleteYellow{{ $yellow->id }}">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $schedule->id }}/yellow/{{ $yellow->id }}/delete" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Hapus Kartu Kuning</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus kartu kuning dari {{ $yellow->player->name }}
                    <input type="hidden" name="team" value="1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
    @foreach ($yellow2 as $yellow)
    <div class="modal fade" tabindex="-1" id="deleteYellow{{ $yellow->id }}">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $schedule->id }}/yellow/{{ $yellow->id }}/delete" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Hapus Kartu Kuning</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus kartu kuning dari {{ $yellow->player->name }}
                    <input type="hidden" name="team" value="2">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
    
    {{-- Modal Red --}}
    {{-- add --}}
    <div class="modal fade" tabindex="-1" id="addRedTeam1">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $schedule->id }}/red/" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Tambah Kartu Kuning Tim {{ $schedule->team1->name }}</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="team" value="1">
                        <label for="player" class="form-label">Pelanggar</label>
                        <select class="form-select" required id="player" name="player">
                            <option selected>Pilih Pemain</option>
                            @foreach ($schedule->team1->player as $t)
                            <option value="{{ $t->id }}">{{ '('.$t->number.') '.$t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="addRedTeam2">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $schedule->id }}/red/" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Tambah Kartu Kuning Tim {{ $schedule->team2->name }}</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="team" value="2">
                        <label for="player" class="form-label">Pelanggar</label>
                        <select class="form-select" required id="player" name="player">
                            <option selected>Pilih Pemain</option>
                            @foreach ($schedule->team2->player as $t)
                            <option value="{{ $t->id }}">{{ '('.$t->number.') '.$t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    {{-- edit --}}
    @foreach ($red1 as $red)
    <div class="modal fade" tabindex="-1" id="editRed{{ $red->id }}">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $schedule->id }}/red/{{ $red->id }}/edit" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Ubah Kartu Merah dari {{ $red->player->name }}</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="team" value="1">
                        <label for="player" class="form-label">Pelanggar</label>
                        <select class="form-select" required id="player" name="player">
                            @foreach ($schedule->team1->player as $t)
                            <option value="{{ $t->id }}" {{ $red->player_id == $t->id ? 'selected' : '' }}>{{ '('.$t->number.') '.$t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Ubah</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
    @foreach ($red2 as $red)
    <div class="modal fade" tabindex="-1" id="editRed{{ $red->id }}">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $schedule->id }}/red/{{ $red->id }}/edit" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Ubah Kartu Merah dari {{ $red->player->name }}</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="hidden" name="team" value="2">
                        <label for="player" class="form-label">Pelanggar</label>
                        <select class="form-select" required id="player" name="player">
                            @foreach ($schedule->team2->player as $t)
                            <option value="{{ $t->id }}" {{ $red->player_id == $t->id ? 'selected' : '' }}>{{ '('.$t->number.') '.$t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Ubah</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
    {{-- delete --}}
    @foreach ($red1 as $red)
    <div class="modal fade" tabindex="-1" id="deleteRed{{ $red->id }}">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $schedule->id }}/red/{{ $red->id }}/delete" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Hapus Kartu Merah</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus kartu merah dari {{ $red->player->name }}
                    <input type="hidden" name="team" value="1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
    @foreach ($red2 as $red)
    <div class="modal fade" tabindex="-1" id="deleteRed{{ $red->id }}">
        <div class="modal-dialog">
            <form action="/admin/schedule/{{ $schedule->id }}/red/{{ $red->id }}/delete" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Hapus Kartu Merah</div>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus kartu Merah dari {{ $red->player->name }}
                    <input type="hidden" name="team" value="2">
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
            Detail Pertandingan {{ $schedule->name }}
        </div>
    </div>
    <div class="container">
        <div class="card p-2 px-auto text-dark" style="text-decoration: none;">
            <div class="row border-bottom">
                <div class="col-12 text-center">Group {{ $schedule->group }}</div>
                <div class="col-5 d-flex flex-column" style="place-items: center; place-content: center;">
                    <img src="/{{ $schedule->team1->image }}" class="border w-50" alt="{{ $schedule->team1->name }}">
                    <div class="fw-bold text-center">{{ $schedule->team1->name }}</div>
                    <div class="fw-bold h2">{{ $schedule->score_1 }}</div>
                </div>
                <div class="col-2 text-center h3 d-flex" style="place-items:  center; place-content: center;">VS</div>
                <div class="col-5 d-flex flex-column" style="place-items: center; place-content: center;">
                    <img src="/{{ $schedule->team2->image }}" class="border w-50" alt="{{ $schedule->team2->name }}">
                    <div class="fw-bold text-center">{{ $schedule->team2->name }}</div>
                    <div class="fw-bold h2">{{ $schedule->score_2 }}</div>
                </div>
                <div class="col-12 text-center fw-bold">
                    {{ $carbon->parse($schedule->time)->diffForHumans() }}
                </div>
            </div>
            <div class="row my-2">
                @php
                    $goals1 = App\Models\Goal::where('schedule_id', $schedule->id)->where('team_id', $schedule->team_1)->get();
                    $reds1 = App\Models\Red::where('schedule_id', $schedule->id)->where('team_id', $schedule->team_1)->get();
                    $yellows1 = App\Models\Yellow::where('schedule_id', $schedule->id)->where('team_id', $schedule->team_1)->get();
                    $goals2 = App\Models\Goal::where('schedule_id', $schedule->id)->where('team_id', $schedule->team_2)->get();
                    $reds2 = App\Models\Red::where('schedule_id', $schedule->id)->where('team_id', $schedule->team_2)->get();
                    $yellows2 = App\Models\Yellow::where('schedule_id', $schedule->id)->where('team_id', $schedule->team_2)->get();
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
        <div class="my-2">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="card bg-danger border-0 text-light p-3 my-2">
                        <div class="text-center fw-bold my-2">{{ $schedule->team1->name }}</div>
                    </div>
                    <div class="card p-3 my-2">
                        <div class="d-flex">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="text-center fw-bold my-2">Goal <i class="fa-solid fa-futbol"></i>
                                </div>
                            </div>
                            <div class="col-1">
                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addGoalTeam1">+</button>
                            </div>
                        </div>
                        <table class="table border-top align-middle mt-3 table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Punggung</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($goal1 as $goal)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $goal->player->number }}</td>
                                        <td>{{ $goal->player->name }}</td>
                                        <td>
                                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#editGoal{{ $goal->id }}"><i class="fa-solid fa-pen"></i></button>
                                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#deleteGoal{{ $goal->id }}"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        @if ($goal1->count() == 0)
                            <div class="text-center text-muted">-- tidak ada data --</div>
                        @endif
                    </div>
                    <div class="card p-3 my-2">
                        <div class="d-flex">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="text-center fw-bold my-2">Kartu Kuning <i class="fa-solid fa-square text-warning"></i>
                                </div>
                            </div>
                            <div class="col-1">
                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addYellowTeam1">+</button>
                            </div>
                        </div>
                        <table class="table border-top align-middle mt-3 table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Punggung</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($yellow1 as $yellow)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $yellow->player->number }}</td>
                                        <td>{{ $yellow->player->name }}</td>
                                        <td>
                                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#editYellow{{ $yellow->id }}"><i class="fa-solid fa-pen"></i></button>
                                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#deleteYellow{{ $yellow->id }}"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        @if ($yellow1->count() == 0)
                            <div class="text-center text-muted">-- tidak ada data --</div>
                        @endif
                    </div>
                    <div class="card p-3 my-2">
                        <div class="d-flex">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="text-center fw-bold my-2">Kartu Merah <i class="fa-solid fa-square text-danger"></i>
                                </div>
                            </div>
                            <div class="col-1">
                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addRedTeam1">+</button>
                            </div>
                        </div>
                        <table class="table border-top align-middle mt-3 table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Punggung</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($red1 as $red)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $red->player->number }}</td>
                                        <td>{{ $red->player->name }}</td>
                                        <td>
                                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#editRed{{ $red->id }}"><i class="fa-solid fa-pen"></i></button>
                                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#deleteRed{{ $red->id }}"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        @if ($red1->count() == 0)
                            <div class="text-center text-muted">-- tidak ada data --</div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="card bg-primary border-0 text-light p-3 my-2">
                        <div class="text-center fw-bold my-2">{{ $schedule->team2->name }}</div>
                    </div>
                    <div class="card p-3 my-2">
                        <div class="d-flex">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="text-center fw-bold my-2">Goal <i class="fa-solid fa-futbol"></i>
                                </div>
                            </div>
                            <div class="col-1">
                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addGoalTeam2">+</button>
                            </div>
                        </div>
                        <table class="table border-top align-middle mt-3 table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Punggung</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($goal2 as $goal)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $goal->player->number }}</td>
                                        <td>{{ $goal->player->name }}</td>
                                        <td>
                                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#editGoal{{ $goal->id }}"><i class="fa-solid fa-pen"></i></button>
                                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#deleteGoal{{ $goal->id }}"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        @if ($goal2->count() == 0)
                            <div class="text-center text-muted">-- tidak ada data --</div>
                        @endif
                    </div>
                    <div class="card p-3 my-2">
                        <div class="d-flex">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="text-center fw-bold my-2">Kartu Kuning <i class="fa-solid fa-square text-warning"></i>
                                </div>
                            </div>
                            <div class="col-1">
                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addYellowTeam2">+</button>
                            </div>
                        </div>
                        <table class="table border-top align-middle mt-3 table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Punggung</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($yellow2 as $yellow)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $yellow->player->number }}</td>
                                        <td>{{ $yellow->player->name }}</td>
                                        <td>
                                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#editYellow{{ $yellow->id }}"><i class="fa-solid fa-pen"></i></button>
                                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#deleteYellow{{ $yellow->id }}"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        @if ($yellow2->count() == 0)
                            <div class="text-center text-muted">-- tidak ada data --</div>
                        @endif
                    </div>
                    <div class="card p-3 my-2">
                        <div class="d-flex">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="text-center fw-bold my-2">Kartu Merah <i class="fa-solid fa-square text-danger"></i>
                                </div>
                            </div>
                            <div class="col-1">
                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addRedTeam2">+</button>
                            </div>
                        </div>
                        <table class="table border-top align-middle mt-3 table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Punggung</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($red2 as $red)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $red->player->number }}</td>
                                        <td>{{ $red->player->name }}</td>
                                        <td>
                                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#editRed{{ $red->id }}"><i class="fa-solid fa-pen"></i></button>
                                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#deleteRed{{ $red->id }}"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        @if ($red2->count() == 0)
                            <div class="text-center text-muted">-- tidak ada data --</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection