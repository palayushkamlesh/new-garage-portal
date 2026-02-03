@extends('layouts.master')
@section('styles')
@endsection
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Customers-Create</h5>

      <!-- Vertical Form -->
      <form action="{{route('customers-store')}}" method="post">
        @csrf

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Full Name">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Email </label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Mobile No. </label>
        <input type="number" name="mobile" class="form-control" id="exampleFormControlInput1" placeholder="+91 *********">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Address </label>
        <input type="text" name="address" class="form-control" id="exampleFormControlInput1" placeholder="B-63 Matru Bhumi ...">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">City</label>
        <input type="text" name="city" class="form-control" id="exampleFormControlInput1" placeholder="Ahmedabad">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">State</label>
        <input type="text" name="state" class="form-control" id="exampleFormControlInput1" placeholder="Gujarat">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Country</label>
        <input type="text" name="country" class="form-control" id="exampleFormControlInput1" placeholder="India">
      </div>

        <div class="text-center">
        <button type="submit" class="btn btn-primary btn-md" name="submit">add customers</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- Vertical Form -->

    </div>
</div>
    @endsection
    @section('scripts')
    @endsection
    