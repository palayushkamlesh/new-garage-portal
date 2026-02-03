@extends('layouts.master')
@section('styles')
@endsection
@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">Employee Types-Edit</h5>

<form action="{{route('employeetypes-update')}}" method="post">
    @csrf
        <input type="hidden" name="id"  value="{{$employeetypes->id}}" >

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" name="name"  value="{{$employeetypes->name}}" placeholder="Name">
  </div>

    <div class="text-center">
    <button type="submit" class="btn btn-primary btn-md" >update employeeTypes</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
  </form><!-- Vertical Form -->

</div>
</div>

@endsection
@section('scripts')
@endsection
    