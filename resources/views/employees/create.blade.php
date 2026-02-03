@extends('layouts.master')
@section('styles')
@endsection
@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Vertical Form</h5>

        <!-- Vertical Form -->
        <form action="{{ route('employees-store') }}" method="post">
            @csrf

            <div class="col-12">
                <label for="subject" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
            </div>

            <div class="col-12">
                <label for="exampleFormControlInput1" class="form-label">Phone</label>
                <input type="number" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="+91 *********">
              </div>

              <div class="col-12">
                <label for="exampleFormControlInput1" class="form-label">Email </label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>
        


            <div class="col-12">
                <label for="exampleFormControlInput1" class="form-label">Employee</label>
                <select name="employeetypes_id" id="" class="form-control" >
                    @foreach ($employeetypes as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            

            <div class="col-12">
                <label for="status" class="form-label">Hourly Rate</label>
                <input type="text" name="hourly_rate" class="form-control" id="hourly_rate" placeholder="amount per hr">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-md" name="submit">Add Employee</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form><!-- Vertical Form -->

    </div>
</div>
@endsection

@section('scripts')
@endsection
