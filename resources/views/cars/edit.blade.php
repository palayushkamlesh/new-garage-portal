@extends('layouts.master')
@section('styles')
@endsection
@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">Customers-Edit</h5>

<form action="{{route('cars-update')}}" method="post" >
    @csrf
        <input type="hidden" name="id"  value="{{$cars->id}}" >

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Customer</label>
    <input type="text" name="customer_id"  value="{{$cars->customer_id}}" placeholder="Customer Name">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Model</label>
    <input type="text" name="model_id"  value="{{$cars->model_id}}" placeholder="Model Name">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">License Plate</label>
    <input type="text" name="license_plate"  value="{{$cars->license_plate}}" placeholder="License Plate">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Vin</label>
    <input type="text" name="vin"  value="{{$cars->vin}}" placeholder="Vin Number">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Color</label>
    <input type="color" name="color"  value="{{$cars->color}}" placeholder="Car Color">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Mileage</label>
    <input type="number" name="mileage"  value="{{$cars->mileage}}" placeholder="Mileage">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Fuel</label>
    <input type="text" name="fuel_type"  value="{{$cars->fuel_type}}" placeholder="Fuel">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Transmission</label>
    <input type="text" name="transmission"  value="{{$cars->transmission}}" placeholder="Transmission">
  </div>

    <div class="text-center">
    <button type="submit" class="btn btn-primary btn-md" >update cars</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
  </form><!-- Vertical Form -->

</div>
</div>

@endsection
@section('scripts')
@endsection
    