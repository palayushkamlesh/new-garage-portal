@extends('layouts.master')
@section('styles')
@endsection
@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Cars-Create</h5>

        <!-- Vertical Form -->
        <form action="{{ route('cars-store') }}" method="post">
            @csrf

            <div class="col-12">
                <label for="exampleFormControlInput1" class="form-label">Customer</label>
                <select name="customer_id" id="" class="form-control" >
                    @foreach ($customers as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                <label for="exampleFormControlInput1" class="form-label">Car Model</label>
                <select name="model_id" id="" class="form-control" >
                    @foreach ($carmodels as $item)
                        <option value="{{ $item->id }}">{{ $item->make }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                <label for="exampleFormControlInput1" class="form-label">License Plate</label>
                <input type="text" name="license_plate" class="form-control" id="exampleFormControlInput1" placeholder="GJ476FV9">
              </div>

              <div class="col-12">
                <label for="exampleFormControlInput1" class="form-label">Vin</label>
                <input type="text" name="vin" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>
        
              <div class="col-12">
                <label for="exampleFormControlInput1" class="form-label">Color</label>
                <input type="color" name="color" class="form-control" id="exampleFormControlInput1" placeholder="Choose Car Color">
              </div>
            

            <div class="col-12">
                <label for="status" class="form-label">Mileage</label>
                <input type="number" name="mileage" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="col-12">
                <label for="exampleFormControlInput1" class="form-label">Fuel</label>
                <input type="text" name="fuel_type" class="form-control" id="exampleFormControlInput1" placeholder="Diesel">
              </div>


              <div class="col-12">
                <label for="exampleFormControlInput1" class="form-label">Transmission </label>
                <input type="text" name="transmission" class="form-control" id="exampleFormControlInput1" placeholder="manual">
              </div>


            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-md" name="submit">Add Car</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form><!-- Vertical Form -->

    </div>
</div>
@endsection

@section('scripts')
@endsection
