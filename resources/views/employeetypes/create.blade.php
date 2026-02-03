@extends('layouts.master')
@section('styles')
@endsection
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">EmployeeTypes-Create</h5>

      <!-- Vertical Form -->
      <form action="{{route('employeetypes-store')}}" method="post">
        @csrf

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Full Name">
      </div>

        <div class="text-center">
        <button type="submit" class="btn btn-primary btn-md" name="submit">add employeetypes</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- Vertical Form -->

    </div>
</div>
    @endsection
    @section('scripts')
    @endsection
    