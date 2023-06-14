@extends('dashboard.template')

@section('body')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Setting</h1>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('setting.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                @if (Session::get('success'))
                                    <div class="alert alert-success alert-dismissible fade show mx-3 col-lg-6"
                                        role="alert">
                                        <strong>Selamat!</strong> Data berhasil disimpan.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <h6>
                                    Navbar
                                </h6>
                                <div class="mb-3 col-lg-6">
                                    <label for="navbar_color" class="form-label">Navbar Color</label>
                                    <input type="color" class="form-control" id="navbar_color" name="navbar_color"
                                        value="{{ $navbar_color ?? '' }}">
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="navbar_font" class="form-label">Navbar Font Color</label>
                                    <input type="color" class="form-control" id="navbar_font" name="navbar_font"
                                        value="{{ $navbar_font ?? '' }}">
                                </div>
                            </div>
                            <div class="row">
                                <h6>
                                    Sidebar
                                </h6>
                                <div class="mb-3 col-lg-6">
                                    <label for="sidebar_font" class="form-label">Sidebar Font Color</label>
                                    <input type="color" class="form-control" id="sidebar_font" name="sidebar_font"
                                        value="{{ $sidebar_font ?? '' }}">
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="sidebar_active" class="form-label">Sidebar Font Active</label>
                                    <input type="color" class="form-control" id="sidebar_active" name="sidebar_active"
                                        value="{{ $sidebar_active ?? '' }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
