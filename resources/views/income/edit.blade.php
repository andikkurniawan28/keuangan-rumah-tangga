@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">{{ ucfirst("dashboard") }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route("income.index") }}">{{ ucfirst("pemasukan") }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit {{ ucfirst("pemasukan") }}</li>
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
                Edit {{ ucfirst("pemasukan") }}
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route("income.update", $income->id) }}" method="POST">
                @csrf @method("PUT")
                <div class="form-group">
                    <label for="description">{{ ucfirst('description') }}</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter description..." value="{{ $income->description }}" required>
                </div>
                <div class="form-group">
                    <label for="value">{{ ucfirst('value') }}</label>
                    <input type="number" class="form-control" id="value" name="value" placeholder="Enter value..." value="{{ $income->value }}" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection
