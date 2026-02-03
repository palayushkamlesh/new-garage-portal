@extends('layouts.master')
@section('styles')
@endsection
@section('content')

@if (Session::get('success'))
    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
    </div>
@endif

<div class="card">
    <div class="card-header">
        <a href="{{route('parts-create')}}" class="btn btn-primary">Add Parts</a>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importExcelModal">
           Import Excel
        </button>
    </div>
   
    
    <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                {{-- <th>CODE</th> --}}
                <th>TYPE</th>
                <th>UOM</th>
                <th>RATE</th>
                {{-- <th>SALE RATE</th>
                <th>PURCHASE RATE</th> --}}
                <th>STATUS</th>
                <th>DESCRIPTION</th>
                {{-- <th>GROUP NAME</th>
                <th>HSN CODE</th>
                <th>SGST</th>
                <th>CGST</th>
                <th>IGST</th>
                <th>VOR RATE</th> --}}
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parts as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    {{-- <td>{{ $item->code }}</td> --}}
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->uom }}</td>
                    <td>{{ $item->rate }}</td>
                    {{-- <td>{{ $item->sale_rate }}</td>
                    <td>{{ $item->purchase_rate }}</td> --}}
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->description }}</td>
                    {{-- <td>{{ $item->group_name }}</td>
                    <td>{{ $item->hsn_code }}</td>
                    <td>{{ $item->sgst }}</td>
                    <td>{{ $item->cgst }}</td>
                    <td>{{ $item->igst }}</td>
                    <td>{{ $item->vor_rate }}</td> --}}

                    <td>
                        <a href="{{ route('parts-edit', ['id' => $item->id]) }}" class="bi bi-pencil-square"></a>
                        <a href="{{ route('parts-delete', ['id' => $item->id]) }}" class="bi bi-trash"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-3">
        {{ $parts->links('vendor.pagination.bootstrap-4') }}

    {{-- Generates Previous & Next buttons --}}
    </div>



    {{-- ✅ Pagination Controls --}}
    @if ($parts->hasPages())
    <nav class="d-flex justify-content-center">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($parts->onFirstPage())
                <li class="page-item disabled"><span class="page-link">← Previous</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $parts->previousPageUrl() }}">← Previous</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($parts->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $parts->nextPageUrl() }}">Next →</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">Next →</span></li>
            @endif
        </ul>
    </nav>
    @endif




    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="importExcelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
          <h5 class="modal-title" id="exampleModalLabel">Import Part Data</h5>
          <button type="button" class="btn btn-danger close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- Excel Upload Button --}}
            <form action="{{ route('parts.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <input type="file" name="excel_file" class="form-control" required>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-file-earmark-arrow-up"></i> Upload Excel
                    </button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
