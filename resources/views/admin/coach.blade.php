@extends('layout.admin-layout')

@section('title', 'Team')

@section('content')
    <div class="modal fade" tabindex="-1" id="addCoach">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="/admin/team/{{ $tm }}/coach">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Tambah Pelatih</div>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Pelatih</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pelatih" required>
                    </div>
                    <div class="mb-3">
                        <label for="alias" class="form-label">Nama Panggilan</label>
                        <input type="text" class="form-control" id="alias" name="alias" placeholder="Nama Panggilan" required>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Posisi</label>
                        <input type="text" class="form-control" id="position" name="position" placeholder="Posisi" required>
                    </div>
                    <div class="mb-3">
                        <label for="achievement" class="form-label">Penghargaan</label>
                        <textarea class="form-control" id="achievement" name="achievement" placeholder="Penghargaan"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea class="form-control" id="catatan" name="catatan" placeholder="Catatan"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="captain" class="form-label">Pelatih Utama Tim?</label>
                        <input type="checkbox" name="captain" id="captain">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    @foreach ($coach as $c)
    <div class="modal fade" tabindex="-1" id="editCoach{{ $c->id }}">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="/admin/team/{{ $tm }}/coach/{{ $c->id }}/edit">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Ubah Pelatih {{ $c->name }}</div>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Pelatih</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pelatih" value="{{ $c->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="alias" class="form-label">Nama Panggilan</label>
                        <input type="text" class="form-control" id="alias" name="alias" placeholder="Nama Panggilan" value="{{ $c->alias }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Posisi</label>
                        <input type="text" class="form-control" id="position" name="position" placeholder="Posisi" value="{{ $c->position }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="achievement" class="form-label">Penghargaan</label>
                        <textarea class="form-control" id="achievement" name="achievement" placeholder="Penghargaan">{{ $c->achievement }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="note" class="form-label">Catatan</label>
                        <textarea class="form-control" id="note" name="note" placeholder="Catatan">{{ $c->note }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="captain" class="form-label">Pelatih Utama Tim?</label>
                        <input type="checkbox" name="captain" id="captain">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Ubah</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="deleteCoach{{ $c->id }}">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="/admin/team/{{ $tm }}/coach/{{ $c->id }}/delete">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Hapus Pelatih {{ $c->name }}</div>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus pelatih {{ $c->name }} ?
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
            Pelatih Tim {{ $tm }}
        </div>
        <div class="col-4 d-flex justify-content-center align-items-center">
            <div>
                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addCoach">+tambah pelatih</button>
            </div>
        </div>
    </div>
    <div class="my-2 d-flex justify-content-center">
        <a href="/admin/team/{{ $tm }}" class="btn btn-danger mx-2">Detail</a>
        <a href="/admin/team/{{ $tm }}/player" class="btn btn-danger mx-2">Pemain</a>
        <a href="/admin/team/{{ $tm }}/coach" class="btn btn-danger mx-2">Pelatih</a>
    </div>
    <div class="container my-2">
        <div class="row">
            @foreach($coach as $c)
            <div class="col-6">
                <div class="card mt-3">
                    <div class="row p-3">
                        <div class="col-6 fw-bold">{{ $c->name }} ({{ $c->alias }})</div>
                        <div class="col-4">{{ $c->position }}</div>
                        <div class="col-2">
                            <div class="dropdown">
                                <button class="btn btn-light" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis"></i></button>
                                <ul class="dropdown-menu">
                                    <li><button data-bs-toggle="modal" data-bs-target="#editCoach{{ $c->id }}" class="dropdown-item">Ubah</button></li>
                                    <li><button data-bs-toggle="modal" data-bs-target="#deleteCoach{{ $c->id }}" class="dropdown-item">Hapus</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection