@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">{{ ucfirst("dashboard") }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route("expenditure.index") }}">{{ ucfirst("pengeluaran") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create {{ ucfirst("pengeluaran") }}</li>
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
                Create {{ ucfirst("pengeluaran") }}
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route("expenditure.store") }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                <div class="form-group">
                    <label for="description">{{ ucfirst('description') }}</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter description..." required>
                </div>
                <div class="form-group">
                    <label for="value">{{ ucfirst('value') }}</label>
                    <input type="number" class="form-control" id="value" name="value" placeholder="Enter value..." required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection
