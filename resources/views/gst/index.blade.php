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
        <a href="{{route('gst-create')}}" class="btn btn-primary">Add Gst</a>
    </div>
    <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>CODE</th>
                <th>RATE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gst as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->rate }}</td>
                    <td>
                        <a href="{{ route('gst-edit', ['id' => $item->id]) }}" class="bi bi-pencil-square"></a>
                        <a href="{{ route('gst-delete', ['id' => $item->id]) }}" class="bi bi-trash"></a>
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
