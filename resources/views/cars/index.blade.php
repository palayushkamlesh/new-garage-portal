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
        <a href="{{route('cars-create')}}" class="btn btn-primary">Add Cars</a>
    </div>
    <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>CUSTOMER</th>
                <th>CAR MODEL</th>
                <th>LICENSE PLATE</th>
                <th>VIN</th>
                <th>COLOR</th>
                <th>MILEAGE</th>
                <th>FUEL</th>
                <th>TRANSMISSSION</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->customers->name }}</td>
                    <td>{{ $item->carmodels->make }}</td>
                    <td>{{ $item->license_plate }}</td>
                    <td>{{ $item->vin	 }}</td>
                    <td>{{ $item->color }}</td>
                    <td>{{ $item->mileage }}</td>
                    <td>{{ $item->fuel_type	 }}</td>
                    <td>{{ $item->transmission	 }}</td>

                    <td>
                        <a href="{{ route('cars-edit', ['id' => $item->id]) }}" class="bi bi-pencil-square"></a>
                        <a href="{{ route('cars-delete', ['id' => $item->id]) }}" class="bi bi-trash"></a>
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
