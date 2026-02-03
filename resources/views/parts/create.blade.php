@extends('layouts.master')
@section('styles')
@endsection
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Parts-Create</h5>

      <!-- Vertical Form -->
      <form action="{{route('parts-store')}}" method="post">
        @csrf

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Full Name">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Code</label>
        <input type="text" name="code" class="form-control" id="exampleFormControlInput1" placeholder="Code">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Type</label>
        <input type="text" name="type" class="form-control" id="exampleFormControlInput1" placeholder="Type">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Uom </label>
        <input type="text" name="uom" class="form-control" id="exampleFormControlInput1" placeholder="Uom">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Rate</label>
        <input type="number" name="rate" class="form-control" id="exampleFormControlInput1" placeholder="1.63">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Sale Rate</label>
        <input type="number" name="sale_rate" class="form-control" id="exampleFormControlInput1" placeholder="1.63">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Purchase Rate</label>
        <input type="number" name="purchase_rate" class="form-control" id="exampleFormControlInput1" placeholder="1.63">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Status </label>
        <input type="text" name="status" class="form-control" id="exampleFormControlInput1" placeholder="Active">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Description </label>
        <input type="text" name="description" class="form-control" id="exampleFormControlInput1" placeholder="description..">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Group name </label>
        <input type="text" name="group_name" class="form-control" id="exampleFormControlInput1" placeholder="Group Name">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Hsn Code</label>
        <input type="number" name="hsn_code" class="form-control" id="exampleFormControlInput1" placeholder="8708">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Sgst</label>
        <input type="number" name="sgst" class="form-control" id="exampleFormControlInput1" placeholder="0.00">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Cgst</label>
        <input type="number" name="cgst" class="form-control" id="exampleFormControlInput1" placeholder="0.00">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Igst</label>
        <input type="number" name="igst" class="form-control" id="exampleFormControlInput1" placeholder="0.00">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Vor rate</label>
        <input type="number" name="vor_rate" class="form-control" id="exampleFormControlInput1" placeholder="0.00">
      </div>

        <div class="text-center">
        <button type="submit" class="btn btn-primary btn-md" name="submit">add parts</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- Vertical Form -->

    </div>
</div>
    @endsection
    @section('scripts')
    @endsection
    