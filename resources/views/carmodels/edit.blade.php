@extends('layouts.master')
@section('styles')
@endsection
@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">Carmodels-Edit</h5>

<form action="{{route('carmodels-update')}}" method="post">
    @csrf
        <input type="hidden" name="id"  value="{{$carmodels->id}}" >

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" name="make"  value="{{$carmodels->make}}" placeholder="Name">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Model </label>
    <input type="text" name="model"  value="{{$carmodels->model}}" placeholder="Car model">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Year</label>
    <input type="number" name="year"  value="{{$carmodels->year}}" placeholder="yy">
  </div>

  
    <div class="text-center">
    <button type="submit" class="btn btn-primary btn-md" >update carmodels</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
  </form><!-- Vertical Form -->

</div>
</div>

@endsection
@section('scripts')
@endsection
    