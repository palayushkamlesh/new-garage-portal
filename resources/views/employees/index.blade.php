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
        <a href="{{route('employees-create')}}" class="btn btn-primary">Add Employees</a>
    </div>
    <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>PHONE</th>
                <th>EMAIL</th>
                <th>EMPLOYEE</th>
                <th>HOURLY RATE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->employeetypes->name }}</td>
                    <td>{{ $item->hourly_rate }}</td>

                    <td>
                        <a href="{{ route('employees-edit', ['id' => $item->id]) }}" class="bi bi-pencil-square"></a>
                        <a href="{{ route('employees-delete', ['id' => $item->id]) }}" class="bi bi-trash"></a>
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
