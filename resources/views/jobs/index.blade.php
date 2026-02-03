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
        <a href="{{route('jobs-create')}}" class="btn btn-primary">Add Jobs</a>
    </div>
    <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>CUSTOMER</th>
                <th>CAR</th>
                <th>TYPE</th>
                <th>INSURANCE</th>
                <th>POLICY</th>
                {{-- <th>START TIME</th>
                <th>END TIME</th> --}}
                <th>DELIVERY</th>
                <th>STATUS</th>
                {{-- <th>REMARK</th> --}}
                {{-- <th>PART</th> --}}
                {{-- <th>QUANTITY</th>
                <th>COST</th> --}}
                <th>EMPLOYEE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->customer?->name ?? 'N/A' }}</td> <!-- Updated -->
                    <td>{{ $item->carmodel?->make ?? 'N/A' }}</td> <!-- Updated -->
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->insurance_company }}</td>
                    <td>{{ $item->policy_number }}</td>
                    {{-- <td>{{ $item->start_time }}</td>
                    <td>{{ $item->end_time }}</td> --}}
                    <td>{{ $item->expected_delivery }}</td>
                    <td>{{ $item->status }}</td>
                    {{-- <td>{{ $item->remarks }}</td> --}}
                    {{-- <td>{{ $item->part?->name ?? 'N/A' }}</td> <!-- Updated --> --}}
                    {{-- <td>{{ $item->quantity }}</td>
                    <td>{{ $item->cost }}</td> --}}
                    <td>{{ $item->employee?->name ?? 'N/A' }}</td> <!-- Updated -->
                  <td>
    <a href="{{ route('jobs-edit', ['id' => $item->id]) }}" class="bi bi-pencil-square"></a>
    <a href="{{ route('jobs-delete', ['id' => $item->id]) }}" class="bi bi-trash"></a>
    <a href="{{ route('invoice.generate', $item->id) }}" class="btn btn-sm btn-outline-primary">
        <i class="fas fa-file-invoice"></i> Invoice
    </a>

    <!-- ✅ Gate Pass PDF Button -->
    <a href="{{ route('gate-pass.pdf', $item->id) }}" class="btn btn-sm btn-primary" target="_blank">
        <i class="fas fa-file-pdf"></i> Gate Pass
    </a>
</td>

                    {{-- <td>
                        <a href="{{ route('invoice.generate', $item->id) }}" class="btn btn-primary">Download Invoice</a>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>

    </div>
</div>
@endsection
@section('scripts')
@endsection
