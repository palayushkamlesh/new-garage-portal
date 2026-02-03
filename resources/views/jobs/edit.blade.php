@extends('layouts.master')
@section('styles')
@endsection
@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">Jobs-Edit</h5>

<form action="{{route('jobs-update')}}" method="post">
    @csrf
        <input type="hidden" name="id"  value="{{$jobs->id}}" >

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Customer</label>
    <input type="text" name="customer_id"  value="{{$jobs->customer_id}}" placeholder="Customer Name">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Car</label>
    <input type="text" name="car_id"  value="{{$jobs->car_id}}" placeholder="Car Name">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Type</label>
    <input type="text" name="type"  value="{{$jobs->type}}" placeholder="Type">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Insurance</label>
    <input type="text" name="insurance_company"  value="{{$jobs->insurance_company}}" placeholder="Insurance">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Policy Number</label>
    <input type="text" name="policy_number"  value="{{$jobs->policy_number}}" placeholder="Policy Number">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Start Time</label>
    <input type="datetime-local" name="start_time"  value="{{$jobs->start_time}}" placeholder="Start Time">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">End Time</label>
    <input type="datetime-local" name="end_time"  value="{{$jobs->end_time}}" placeholder="End Time">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Delivery</label>
    <input type="date" name="expected_delivery"  value="{{$jobs->expected_delivery}}" placeholder="Expected Delivery">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Status</label>
    <input type="text" name="status"  value="{{$jobs->status}}" placeholder="Status">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Remarks</label>
    <input type="text" name="remarks"  value="{{$jobs->remarks}}" placeholder="Remarks">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Part</label>
    <input type="text" name="part_id"  value="{{$jobs->part_id}}" placeholder="Part Name">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Quantity</label>
    <input type="number" name="quantity"  value="{{$jobs->quantity}}" placeholder="Quantity">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Cost</label>
    <input type="number" name="cost"  value="{{$jobs->cost}}" placeholder="Cost">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Employee</label>
    <input type="text" name="employee_id"  value="{{$jobs->customer_id}}" placeholder="Employee Name">
  </div>

    <div class="text-center">
    <button type="submit" class="btn btn-primary btn-md" >update jobs</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
  </form><!-- Vertical Form -->

</div>
</div>

@endsection
@section('scripts')
@endsection
    