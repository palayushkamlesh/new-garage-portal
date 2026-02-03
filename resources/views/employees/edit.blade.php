@extends('layouts.master')
@section('styles')
@endsection
@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">Employees-Edit</h5>

<form action="{{route('employees-update')}}" method="post">
    @csrf
        <input type="hidden" name="id"  value="{{$employees->id}}" >

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" name="name"  value="{{$employees->name}}" placeholder="Name">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Phone</label>
    <input type="number" name="phone"  value="{{$employees->phone}}" placeholder="+91 9724669756">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Email</label>
    <input type="email" name="email"  value="{{$employees->email}}" placeholder="Email">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Type</label>
    <input type="text" name="employeetypes_id"  value="{{$employees->employeetypes_id}}" placeholder="Employee Type">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Hour Rate</label>
    <input type="text" name="hourly_rate"  value="{{$employees->hourly_rate}}" placeholder="Hour Rate">
  </div>

    <div class="text-center">
    <button type="submit" class="btn btn-primary btn-md" >update employees</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
  </form><!-- Vertical Form -->

</div>
</div>

@endsection
@section('scripts')
@endsection
    