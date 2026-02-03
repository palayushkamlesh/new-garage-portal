@extends('layouts.master')
@section('styles')
@endsection
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Gst-Create</h5>

      <!-- Vertical Form -->
      <form action="{{route('gst-store')}}" method="post">
        @csrf

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Code</label>
        <input type="text" name="code" class="form-control" id="exampleFormControlInput1" placeholder="cgst">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Rate</label>
        <input type="decimal" name="rate" class="form-control" id="exampleFormControlInput1" placeholder="11.00">
      </div>

        <div class="text-center">
        <button type="submit" class="btn btn-primary btn-md" name="submit">add gst</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- Vertical Form -->

    </div>
</div>
    @endsection
    @section('scripts')
    @endsection
    