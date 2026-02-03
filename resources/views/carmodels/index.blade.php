@extends('layouts.master')
@section('styles')
@endsection
@section('content')

<div class="card">
    @if (Session::get('success'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

<div class="card">
    <div class="card-header">
        <a href="{{route('carmodels-create')}}" class="btn btn-primary">Add Carmodels</a>
    </div>
    <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>MODEL</th>
                <th>YEAR</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carmodels as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->make }}</td>
                    <td>{{ $item->model }}</td>
                    <td>{{ $item->year }}</td>
                    <td>
                        <a href="{{ route('carmodels-edit', ['id' => $item->id]) }}" class="bi bi-pencil-square"></a>
                        <a href="{{ route('carmodels-delete', ['id' => $item->id]) }}" class="bi bi-trash"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    </div>
</div>
@endsection
@section('scripts')
@endsection
