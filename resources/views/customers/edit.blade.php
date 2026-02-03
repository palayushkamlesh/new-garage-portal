@extends('layouts.master')
@section('styles')
@endsection
@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">Customers-Edit</h5>

<form action="{{route('customers-update')}}" method="post" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="id"  value="{{$customers->id}}" >

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" name="name"  value="{{$customers->name}}" placeholder="Name">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Email </label>
    <input type="email" name="email"  value="{{$customers->email}}" placeholder="name@example.com">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Mobile No.</label>
    <input type="number" name="mobile"  value="{{$customers->mobile}}" placeholder="+91 9785649535">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Address </label>
    <input type="text" name="address"  value="{{$customers->address}}" placeholder="B-63 Matru Bhumi ...">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">City</label>
    <input type="text" name="city"  value="{{$customers->city}}" placeholder="Ahmedabad">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">State</label>
    <input type="text" name="state"  value="{{$customers->state}}" placeholder="Gujarat">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Country</label>
    <input type="text" name="country"  value="{{$customers->country}}" placeholder="India">
  </div>

    <div class="text-center">
    <button type="submit" class="btn btn-primary btn-md" >update customers</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
  </form><!-- Vertical Form -->

</div>
</div>

@endsection
@section('scripts')
@endsection
    