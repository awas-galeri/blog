@extends('dashboard.template')

@section('body')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Profile</h1>
        </div>
        <div class="row my-4">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="card">
                    <img src="{{ url('asset2/img/comment-1.jpg') }}" alt="" width="100px">
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="card p-3">
                    <div class="col-md-12 text-end mb-2">
                        <a href="javascript(0)" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Edit</a>
                    </div>
                    <h6>Nama : {{ auth()->user()->username }}</h6>
                    <h6>Email : {{ auth()->user()->email }}</h6>
                    <h6>Nomor HP : {{ auth()->user()->phone ?? '-' }}</h6>
                    <hr>
                    <h6>Alamat</h6>
                    <h6>Provinsi : {{ auth()->user()->provinsi ?? '-' }}</h6>
                    <h6>Kabupaten : {{ auth()->user()->kota ?? '-' }}</h6>
                    <h6>Kecamatan : {{ auth()->user()->kecamatan ?? '-' }}</h6>
                    <h6>Desa : {{ auth()->user()->desa ?? '-' }}</h6>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Setting Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.store') }}" method="POST">
                        <input type="hidden" name="id" value="{{ $user->id }}" />
                        @csrf
                        <div class="row">
                            <h6>Data User</h6>
                            <br>
                            <div class="col-md-3">
                                <label for="">Sapaan</label>
                                <select class="form-select" name="sapaan" id="">
                                    @foreach (['Pak', 'Bu', 'Mbak', 'Mas'] as $item)
                                        <option value="{{ $item }}"
                                            {{ $user->sapaan == $item ? 'selected' : '' }}>
                                            {{ $item }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="">Panggilan</label>
                                <input type="text" name="panggilan" class="form-control" value="{{ $user->panggilan }}">
                            </div>
                            <div class="col-md-3">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div>
                            <div class="col-md-3">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                            </div>
                        </div>
                        <div class="row">
                            <br>
                            <div class="col-md-4">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                            </div>
                            <div class="col-md-4">
                                <label for="">Nomor HP</label>
                                <input type="number" name="phone" class="form-control" value="{{ $user->phone }}">
                            </div>
                            <div class="col-md-4">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" value="{{ $user->tgl_lahir }}">
                            </div>
                        </div>
                        <div class="row mb-2 mt-3">
                            <h6>Alamat</h6>
                            <br>
                            <div class="col-md-3">
                                <div class="form">
                                    <label for="">Provinsi</label>
                                    <select class="form-select" name="provinsi" id="provinsi-select"
                                        value="{{ $user->provinsi }}">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form">
                                    <label for="">Kota/Kabupaten</label>
                                    <select class="form-select" name="kota" id="kabupaten-select"
                                        value="{{ $user->kota }}">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form">
                                    <label for="">Kecamatan</label>
                                    <select class="form-select" name="kecamatan" id="kecamatan-select"
                                        value="{{ $user->kecamatan }}">
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form">
                                    <label for="">Desa</label>
                                    <select class="form-select" name="desa" id="desa-select"
                                        value="{{ $user->desa }}">
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{-- <script src="{{ url('/api-daerah/js/api-daerah.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/gh/davidaprilio/laravel-api-daerah@1.1.0/resources/js/api-daerah.js"
        integrity="sha256-QQB5jg1gf2+7D7eYeh+4NTqbLxI+ePkyAL7MhHhEU9E=" crossorigin="anonymous"></script>

    <script>
        const apiDaerah = new ApiDaerah({
            baseUrl: 'https://davidaprilio.github.io/data-lokasi-indonesia/json/simple',
            supportSelectValue: true,
            provinsi: {
                id: 'provinsi-select',
                value: 'code',
                text: 'name',
                endpoint: '/provinsi',
            },
            kabupaten: {
                id: 'kabupaten-select',
                value: 'code',
                text: 'fullname',
                endpoint: '/kabupaten/:id', // :id wajib diisi jika mau custom
            },
            kecamatan: {
                id: 'kecamatan-select',
                value: 'code',
                text: 'name',
                endpoint: '/kecamatan/:id',
            },
            desa: {
                id: 'desa-select',
                value: 'code',
                text: 'name',
                endpoint: '/desa/:id',
            },
            enabled: {
                desa: true, // nyalakan fiture desa (default false)
            }
        })
    </script>
    {{-- <script>
        const apiDaerah = new ApiDaerah({
            baseUrl: 'https://davidaprilio.github.io/data-lokasi-indonesia/json/simple',
            supportSelectValue: true,
            provinsi: {
                id: 'provinsi-select',
                value: 'code',
                text: 'name',
                endpoint: '/provinsi',
            },
            kabupaten: {
                id: 'kabupaten-select',
                value: 'code',
                text: 'fullname',
                endpoint: '/kabupaten/:id', // :id wajib diisi jika mau custom
            },
            kecamatan: {
                id: 'kecamatan-select',
                value: 'code',
                text: 'name',
                endpoint: '/kecamatan/:id',
            },
            desa: {
                id: 'desa-select',
                value: 'code',
                text: 'name',
                endpoint: '/desa/:id',
            },
            enabled: {
                desa: true, // nyalakan fiture desa (default false)
            }
        })
    </script> --}}
@endsection
