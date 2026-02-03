@extends('layouts.master')
@section('styles')
@endsection
@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">Parts-Edit</h5>

<form action="{{route('parts-update')}}" method="post" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="id"  value="{{$parts->id}}" >

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" name="name"  value="{{$parts->name}}" placeholder="Name">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Code </label>
    <input type="text" name="code"  value="{{$parts->code}}" placeholder="Code">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Type </label>
    <input type="text" name="type"  value="{{$parts->type}}" placeholder="Type">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Uom </label>
    <input type="text" name="uom"  value="{{$parts->uom}}" placeholder="Uom">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Rate </label>
    <input type="number" name="rate"  value="{{$parts->rate}}" placeholder="Rate">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Sale Rate </label>
    <input type="number" name="sale_rate"  value="{{$parts->sale_rate}}" placeholder="Sale Rate">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Purchase Rate </label>
    <input type="number" name="purchase_rate"  value="{{$parts->purchase_rate}}" placeholder="Purchase Rate">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Status </label>
    <input type="text" name="status"  value="{{$parts->status}}" placeholder="Active">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Description </label>
    <input type="text" name="description"  value="{{$parts->description}}" placeholder="Description">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Group Name </label>
    <input type="text" name="group_name"  value="{{$parts->group_name}}" placeholder="Group Name">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Hsn Code </label>
    <input type="number" name="hsn_code"  value="{{$parts->hsn_code}}" placeholder="8708">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Sgst</label>
    <input type="number" name="sgst"  value="{{$parts->sgst}}" placeholder="Sgst">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Cgst</label>
    <input type="number" name="cgst"  value="{{$parts->cgst}}" placeholder="Cgst">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Igst</label>
    <input type="number" name="igst"  value="{{$parts->igst}}" placeholder="Igst">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Vor Rate</label>
    <input type="number" name="vor_rate"  value="{{$parts->vor_rate}}" placeholder="Vor Rate">
  </div>

    <div class="text-center">
    <button type="submit" class="btn btn-primary btn-md" >update parts</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
  </form><!-- Vertical Form -->

</div>
</div>

@endsection
@section('scripts')
@endsection
    