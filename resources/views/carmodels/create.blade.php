@extends('layouts.master')
@section('styles')
@endsection
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">CarModels-Create</h5>

      <!-- Vertical Form -->
      <form action="{{route('carmodels-store')}}" method="post">
        @csrf

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" name="make" class="form-control" id="exampleFormControlInput1" placeholder="Car Name">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Model </label>
        <input type="text" name="model" class="form-control" id="exampleFormControlInput1" placeholder="Car Model">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Year</label>
        <input type="number" name="year" class="form-control" id="exampleFormControlInput1" placeholder="yy">
      </div>

        <div class="text-center">
        <button type="submit" class="btn btn-primary btn-md" name="submit">add carmodels</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- Vertical Form -->

    </div>
</div>
    @endsection
    @section('scripts')
    @endsection
    