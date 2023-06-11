@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">{{ ucfirst("dashboard") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("setting") }}</li>
        </ol>
    </nav>

    @include('components.alert', [
        'message' => Session::get('success'),
        'color' => 'success',
        'errors' => $errors,
    ])

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Edit {{ ucfirst("setting") }}
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route("setting_process") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="app_name">{{ ucfirst('application name') }}</label>
                    <input type="text" class="form-control" id="app_name" name="app_name" placeholder="Enter app_name..." value="{{ $global['app_name'] }}" required>
                </div>
                <div class="form-group">
                    <label for="app_color">{{ ucfirst('application color') }}</label>
                    <select name="app_color" class="form-control">
                        <option value="danger" @if($global["app_color"] == "danger") {{ "selected" }} @endif>Merah</option>
                        <option value="primary" @if($global["app_color"] == "primary") {{ "selected" }} @endif>Biru</option>
                        <option value="success" @if($global["app_color"] == "success") {{ "selected" }} @endif>Hijau</option>
                        <option value="warning" @if($global["app_color"] == "warning") {{ "selected" }} @endif>Kuning</option>
                        <option value="info" @if($global["app_color"] == "info") {{ "selected" }} @endif>Biru Muda</option>
                        <option value="dark" @if($global["app_color"] == "dark") {{ "selected" }} @endif>Hitam</option>
                        <option value="light" @if($global["app_color"] == "light") {{ "selected" }} @endif>Putih</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="app_font_color">{{ ucfirst('application font color') }}</label>
                    <select name="app_font_color" class="form-control">
                        <option value="dark" @if($global["app_font_color"] == "dark") {{ "selected" }} @endif>Putih</option>
                        <option value="light" @if($global["app_font_color"] == "light") {{ "selected" }} @endif>Hitam</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection