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
        <a href="{{route('customers-create')}}" class="btn btn-primary">Add Customers</a>
    </div>
    <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
                <th>EMAIL</th>
                <th>MOBILE</th>
                <th>Address</th>
                <th>CITY</th>
                <th>STATE</th>
                <th>COUNTRY</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $item)
                <tr>
                    <td> <img height="50" src="{{asset('images/'. $item->image)}}" alt=""></td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->mobile }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->city }}</td>
                    <td>{{ $item->state }}</td>
                    <td>{{ $item->country }}</td>
                    <td>
                        <a href="{{ route('customers-edit', ['id' => $item->id]) }}" class="bi bi-pencil-square"></a>
                        <a href="{{ route('customers-delete', ['id' => $item->id]) }}" class="bi bi-trash"></a>
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
