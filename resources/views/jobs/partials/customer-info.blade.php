<div class="form-group">
    <label>Name</label>
    <input type="text" name="customer_name" class="form-control" value="{{ $customers->name }}" readonly>
</div>
<div class="form-group">
    <label>Phone</label>
    <input type="text" name="customer_phone" class="form-control" value="{{ $customers->phone }}" readonly>
</div>
<div class="form-group">
    <label>Address</label>
    <textarea name="customer_address" class="form-control" readonly>{{ $s->address }}</textarea>
</div>

<!-- Car and parts from last job -->
@if($customer->cars->count())
    <h5>Last Car</h5>
    <input type="text" class="form-control" name="car_name" value="{{ $customers->cars->last()->model }}" />
@endif
