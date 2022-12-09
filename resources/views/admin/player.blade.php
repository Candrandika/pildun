@extends('layout.admin-layout')

@section('title', 'Team')

@section('content')
    <div class="modal fade" tabindex="-1" id="addPlayer">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="/admin/team/{{ $tm }}/player">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Tambah Pemain</div>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Pemain</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pemain" required>
                    </div>
                    <div class="mb-3">
                        <label for="alias" class="form-label">Nama Panggilan</label>
                        <input type="text" class="form-control" id="alias" name="alias" placeholder="Nama Panggilan" required>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Posisi</label>
                        <select class="form-select" id="position" name="position" id="position" required>
                            <option selected>Pilih Posisi</option>
                            <option value="Penjaga Gawang">Penjaga Gawang</option>
                            <option value="Pemain Bertahan">Pemain Bertahan</option>
                            <option value="Gelandang">Gelandang</option>
                            <option value="Pemain Depan">Pemain Depan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Nomor Punggung</label>
                        <input type="number" min="1" max="99" class="form-control" id="number" name="number" placeholder="Nomor Punggung" required>
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
                        <label for="captain" class="form-label">Kapten Tim?</label>
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

    @foreach ($player as $p)
    <div class="modal fade" tabindex="-1" id="editPlayer{{ $p->id }}">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="/admin/team/{{ $tm }}/player/{{ $p->id }}/edit">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Ubah Pemain {{ $p->name }}</div>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Pemain</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Pemain" value="{{ $p->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="alias" class="form-label">Nama Panggilan</label>
                        <input type="text" class="form-control" id="alias" name="alias" placeholder="Nama Panggilan" value="{{ $p->alias }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Posisi</label>
                        <select class="form-select" id="position" name="position" id="position" required>
                            <option selected>Pilih Posisi</option>
                            <option value="Penjaga Gawang" {{ $p->position == 'Penjaga Gawang' ? 'selected' : '' }}>Penjaga Gawang</option>
                            <option value="Pemain Bertahan" {{ $p->position == 'Pemain Bertahan' ? 'selected' : '' }}>Pemain Bertahan</option>
                            <option value="Gelandang" {{ $p->position == 'Gelandang' ? 'selected' : '' }}>Gelandang</option>
                            <option value="Pemain Depan" {{ $p->position == 'Penjaga Depan' ? 'selected' : '' }}>Pemain Depan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Nomor Punggung</label>
                        <input type="number" min="1" max="99" class="form-control" id="number" name="number" placeholder="Nomor Punggung" value="{{ $p->number }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="achievement" class="form-label">Penghargaan</label>
                        <textarea class="form-control" id="achievement" name="achievement" placeholder="Penghargaan" >{{ $p->achievement }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea class="form-control" id="catatan" name="catatan" placeholder="Catatan">{{ $p->note }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="captain" class="form-label">Kapten Tim?</label>
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
    <div class="modal fade" tabindex="-1" id="deletePlayer{{ $p->id }}">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="/admin/team/{{ $tm }}/player/{{ $p->id }}/delete">
                @csrf
                <div class="modal-header">
                    <div class="modal-title fs-5">Hapus Pemain</div>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">Apa anda yakin ingin menghapus pemain {{ $p->name }}?</div>
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
            Pemain Tim {{ $tm }}
        </div>
        <div class="col-4 d-flex justify-content-center align-items-center">
            <div>
                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addPlayer">+tambah pemain</button>
            </div>
        </div>
    </div>
    <div class="my-2 d-flex justify-content-center">
        <a href="/admin/team/{{ $tm }}" class="btn btn-danger mx-2">Detail</a>
        <a href="/admin/team/{{ $tm }}/player" class="btn btn-danger mx-2">Pemain</a>
        <a href="/admin/team/{{ $tm }}/coach" class="btn btn-danger mx-2">Pelatih</a>
    </div>
    <div class="container my-2">
        @foreach($player as $p)
        <div class="card mt-3">
            <div class="row p-3">
                <div class="col-1">{{ $p->number }}</div>
                <div class="col-4 fw-bold">{{ $p->name }} ({{ $p->alias }})</div>
                <div class="col-2">{{ $p->position }}</div>
                <div class="col-4">Goal <i class="fa-solid fa-futbol"></i> : {{ $p->goal->count() }} | Kartu Kuning <i class="fa-solid fa-square text-warning"></i> : {{ $p->yellow->count() }} | Kartu Merah <i class="fa-solid fa-square text-danger"></i> : {{ $p->red->count() }}</div>
                <div class="col-1">
                    <div class="dropdown">
                        <button class="btn btn-light" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis"></i></button>
                        <ul class="dropdown-menu">
                            <li><button data-bs-toggle="modal" data-bs-target="#editPlayer{{ $p->id }}" class="dropdown-item">Ubah</button></li>
                            <li><button data-bs-toggle="modal" data-bs-target="#deletePlayer{{ $p->id }}" class="dropdown-item">Hapus</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection