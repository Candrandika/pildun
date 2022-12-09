@extends('layout.admin-layout')

@section('title', 'Team')

@section('content')

    <div class="modal fade" id="addTeam" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="/admin/team" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <div class="fs-5 modal-title">Tambah Tim</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Tim</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Tim" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Tim</label>
                        <input type="file" class="form-control" id="image" name="image" accept=".jpg, .png, .jpeg" required>
                    </div>
                    <div class="mb-3">
                        <label for="group" class="form-label">Grup</label>
                        <select class="form-select" id="group" name="group">
                            <option selected>Pilih grup</option>
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
                        <label for="achievement" class="form-label">Penghargaan</label>
                        <textarea type="text" class="form-control" id="achievement" name="achievement" placeholder="Penghargaan"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="note" class="form-label">Catatan</label>
                        <textarea type="text" class="form-control" id="note" name="note" placeholder="Catatan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    @foreach ($teams as $team)
    <div class="modal fade" id="editTeam{{ $team->id }}" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="/admin/team/{{ $team->id }}/edit" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <div class="fs-5 modal-title">Ubah Tim {{ $team->name }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Tim</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Tim" value="{{ $team->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Tim</label>
                        <input type="file" class="form-control" id="image" name="image" accept=".jpg, .png, .jpeg">
                    </div>
                    <div class="mb-3">
                        <label for="group" class="form-label">Grup</label>
                        <select class="form-select" id="group" name="group">
                            <option value="A" {{ $team->group == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ $team->group == 'B' ? 'selected' : '' }}>B</option>
                            <option value="C" {{ $team->group == 'C' ? 'selected' : '' }}>C</option>
                            <option value="D" {{ $team->group == 'D' ? 'selected' : '' }}>D</option>
                            <option value="E" {{ $team->group == 'E' ? 'selected' : '' }}>E</option>
                            <option value="F" {{ $team->group == 'F' ? 'selected' : '' }}>F</option>
                            <option value="G" {{ $team->group == 'G' ? 'selected' : '' }}>G</option>
                            <option value="H" {{ $team->group == 'H' ? 'selected' : '' }}>H</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="achievement" class="form-label">Penghargaan</label>
                        <textarea type="text" class="form-control" id="achievement" name="achievement" placeholder="Penghargaan">{{ $team->achievement }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="note" class="form-label">Catatan</label>
                        <textarea type="text" class="form-control" id="note" name="note" placeholder="Catatan">{{ $team->note }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Ubah</button>
                </div>
            </form>
        </div>
    </div>
    
    <div class="modal fade" id="deleteTeam{{ $team->id }}" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" method="Post" action="/admin/team/{{ $team->id }}/delete" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <div class="fs-5 modal-title">Hapus Tim</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus tim {{ $team->name }}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach

    <div class="d-flex">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="text-center h2 fw-bold my-4">
                Tim di Piala Dunia
            </div>
        </div>
        <div class="col-4 d-flex justify-content-center align-items-center">
            <div>
                <div class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addTeam">+ Tambah Tim</div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($teams as $team)
            <div class="col-sm-12 col-md-12 col-lg-6 my-2">
                <div class="card p-1">
                    <div class="d-flex">
                        <div class="col-4">
                            <a href="/admin/team/{{ $team->name }}"><img src="/{{ $team->image }}" alt="{{ $team->name }}" class="border" height="100px"></a>
                        </div>
                        <div class="col-6">
                            <a href="/admin/team/{{ $team->name }}" class="fw-bold text-dark" style="text-decoration:none;">{{ $team->name }}</a>
                            <div>
                                Pemain: {{ $team->player->count() }} | Pelatih: {{ $team->coach->count() }}
                            </div>
                            <div>
                                Kapten: {{ $team->captain ? $team->captain->name : '-belum dipilih-' }}
                            </div>
                            <div>
                                Pelatih: {{ $team->main_coach ? $team->main_coach->name : '-belum dipilih-' }}
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="d-flex justify-content-end align-items-center">
                                <div class="dropdown">
                                    <button class="btn btn-secondary" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis"></i></button>
                                    <ul class="dropdown-menu">
                                        <li><a  href="/admin/team/{{ $team->name }}" class="dropdown-item">Detail</a></li>
                                        <li><button type="button" data-bs-toggle="modal" data-bs-target="#editTeam{{ $team->id }}" class="dropdown-item">Ubah</button></li>
                                        <li><button type="button" data-bs-toggle="modal" data-bs-target="#deleteTeam{{ $team->id }}" class="dropdown-item">Hapus</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@push('script')
    @error('name')
    <script>
            alert('{{ $message }}')
    </script>
    @enderror
    @error('image')
    <script>
            alert('{{ $message }}')
    </script>
    @enderror
@endpush