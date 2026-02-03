@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--multiple {
            min-height: 50px;
            font-size: 16px;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Jobs - Create</h5>
            <div id="stepper" class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                    <div class="step" data-target="#step1">
                        <button class="step-trigger" role="tab">Step 1: Customer & Car</button>
                    </div>
                    <div class="step" data-target="#step2">
                        <button class="step-trigger" role="tab">Step 2: Job Details</button>
                    </div>
                    <div class="step" data-target="#step3">
                        <button class="step-trigger" role="tab">Step 3: Parts & Employees</button>
                    </div>
                    <div class="step" data-target="#step4">
                        <button class="step-trigger" role="tab">Step 4: Invoice Preview</button>
                    </div>


                </div>

                <div class="bs-stepper-content">
                    <form action="{{ route('jobs-store') }}" method="post">
                        @csrf

                        {{-- <!-- Step 1 -->
                        <div id="step1" class="content">

                            <label for="customer_id">Select Customer</label>
                            <select id="customer_id" name="customer_id" class="form-control">
                                <option value="">-- Search or Add Customer --</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->phone }})
                                    </option>
                                @endforeach
                            </select> --}}

                        <!-- Step 1 -->
                        <div id="step1" class="content">

                            <label for="customer_id">Select Customer</label>
                            <select id="customer_id" name="customer_id" class="form-control">
                                <option value="">-- Search or Add Customer --</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->phone }})
                                    </option>
                                @endforeach
                            </select>

                            <br>

                            <label for="vin_search">Or Search by VIN</label>
                            <input type="text" id="vin_search" class="form-control"
                                placeholder="Enter VIN Number (min 5 chars)">

                            <br>

                            {{-- <!-- Auto-filled customer info -->
    <label>Customer Name</label>
    <input type="text" id="customer_name" class="form-control" readonly>

    <label>Customer Phone</label>
    <input type="text" id="customer_phone" class="form-control" readonly>

    <label>Customer Address</label>
    <input type="text" id="customer_address" class="form-control" readonly>

    <br>

    <div id="job-history-panel"><em>No customer selected</em></div>
</div> --}}




                            <div style="display: flex; gap: 30px; margin-top: 15px;">
                                <!-- Left: Auto-fill customer info -->
                                <div style="flex: 2;" id="customer-info-container">
                                    <div class="form-group">
                                        <label>Customer Name</label>
                                        <input type="text" id="customer_name" name="new_customer_name"
                                            class="form-control" />
                                    </div>




                                </div>

                                <!-- Right: Job history -->
                                <div style="flex: 1; background: #f9f9f9; padding: 15px; border-left: 1px solid #ccc;"
                                    id="customer-previous-jobs">
                                    <h5>Previous Job History</h5>
                                    <div id="job-history-panel">
                                        <em>No customer selected</em>
                                    </div>
                                </div>
                            </div>

                            <!-- Button to add new customer -->
                            <button type="button" class="btn btn-sm btn-outline-primary mt-2" data-bs-toggle="modal"
                                data-bs-target="#addCustomerModal">
                                + Add New Customer
                            </button>




                            <div class="mb-3">
                                <label for="car_id">Car</label>
                                <select name="car_id" class="form-control">
                                    @foreach ($carmodels as $item)
                                        <option value="{{ $item->id }}">{{ $item->make }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary" type="button" onclick="stepper.next()">Next</button>
                        </div>

                        <!-- Step 2 -->
                        <div id="step2" class="content">
                            <div class="mb-3">
                                <label for="type">Type</label>
                                <select name="type" class="form-control">
                                    <option value="accident">Accident</option>
                                    <option value="regular">Regular</option>
                                    <option value="special">Special</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="insurance">Insurance</label>
                                <input type="text" name="insurance_company" class="form-control"
                                    placeholder="Insurance Company Name">
                            </div>
                            <div class="mb-3">
                                <label for="policy">Policy</label>
                                <input type="text" name="policy_number" class="form-control" placeholder="Policy Number">
                            </div>
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="pending">Pending</option>
                                    <option value="in-progress">In-Progress</option>
                                    <option value="completed">Completed</option>
                                    <option value="delivered">Delivered</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="remarks">Remarks</label>
                                <input type="text" name="remarks" class="form-control" placeholder="Remarks">
                            </div>
                            <div class="mb-3">
                                <label for="start_time">Start Time</label>
                                <input type="datetime-local" name="start_time" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="end_time">End Time</label>
                                <input type="datetime-local" name="end_time" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="expected_delivery">Expected Delivery</label>
                                <input type="date" name="expected_delivery" class="form-control" required>
                            </div>
                            <button class="btn btn-secondary" type="button"
                                onclick="stepper.previous()">Previous</button>
                            <button class="btn btn-primary" type="button" onclick="stepper.next()">Next</button>
                        </div>

                        <!-- Step 3 -->
                        <div id="step3" class="content">
                            <div class="col-12">
                                <label class="form-label">Part(s)</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="form-label">Qty</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="form-label">Rate</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="form-label">Sale Rate</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="form-label">SGST</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="form-label">CGST</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="form-label">IGST</label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="form-label">Total</label>

                                <div id="parts-container">
                                    <div class="input-group mb-2 part-row">
                                        <select name="part_id[]" class="form-control part-select"></select>

                                        <input type="number" name="quantity[]" class="form-control quantity"
                                            placeholder="Qty" value="1">
                                        <input type="text" name="rate[]" class="form-control rate"
                                            placeholder="Rate" readonly>
                                        <input type="text" name="sale_rate[]" class="form-control sale rate"
                                            placeholder="Sale Rate" readonly>

                                        {{-- SGST Dropdown --}}
                                        <select name="sgst_id[]" class="form-control" required>
                                            <option value="">Select SGST</option>
                                            @foreach ($gst as $gsts)
                                                <option value="{{ $gsts->rate }}">{{ $gsts->code }} -
                                                    {{ $gsts->rate }}%</option>
                                            @endforeach
                                        </select>

                                        {{-- CGST Dropdown --}}
                                        <select name="cgst_id[]" class="form-control" required>
                                            <option value="">Select CGST</option>
                                            @foreach ($gst as $gsts)
                                                <option value="{{ $gsts->rate }}">{{ $gsts->code }} -
                                                    {{ $gsts->rate }}%</option>
                                            @endforeach
                                        </select>

                                        {{-- IGST Dropdown --}}
                                        <select name="igst_id[]" class="form-control" required>
                                            <option value="">Select IGST</option>
                                            @foreach ($gst as $gsts)
                                                <option value="{{ $gsts->rate }}">{{ $gsts->code }} -
                                                    {{ $gsts->rate }}%</option>
                                            @endforeach
                                        </select>

                                        <input type="text" name="total_cost[]" class="form-control total-cost"
                                            placeholder="Total" readonly>
                                        <input type="hidden" name="uom[]" class="uom">
                                        <input type="hidden" name="hsn_code[]" class="hsn_code">
                                        <button type="button" class="btn btn-primary" id="add_part">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="employee_id">Employee</label>
                                <select name="employee_id" class="form-control">
                                    @foreach ($employees as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <strong>Invoice Total: ₹<span id="invoice-total">0.00</span></strong>
                            </div>

                            <button class="btn btn-secondary" type="button"
                                onclick="stepper.previous()">Previous</button>
                            <button class="btn btn-primary" type="button" onclick="stepper.next()">Next</button>
                        </div>


                        <!-- Step 4 - Invoice Preview -->
                        <div id="step4" class="content"
                            style="font-family: 'Helvetica Neue', sans-serif; padding: 40px; background: #fff; max-width: 800px; margin: auto; border: 1px solid #eee; box-shadow: 0 0 10px rgba(0,0,0,0.1);">

                            <h1 style="text-align: right; letter-spacing: 5px; font-size: 32px;">INVOICE</h1>
                            <hr style="margin: 20px 0;">

                            <div style="display: flex; justify-content: space-between; font-size: 14px;">
                                <div>
                                    <strong>ISSUED TO:</strong><br>
                                    <span id="preview-customer-name">--</span><br>
                                    <span id="preview-customer-address">--</span>
                                </div>
                                <div style="text-align: right;">
                                    <strong>INVOICE NO:</strong> <span id="preview-invoice-no">AUTO</span><br>
                                    <strong>DATE:</strong> <span id="preview-date">--</span><br>
                                    <strong>DUE DATE:</strong> <span id="preview-due-date">--</span>
                                </div>
                            </div>

                            <div style="margin-top: 30px; font-size: 14px;">
                                <strong>PAY TO:</strong><br>
                                Garage Account<br>
                                Account Name: <span id="preview-employee-name">--</span><br>
                                Account No.: 1234 5678 9012
                            </div>

                            <table style="width: 100%; margin-top: 30px; border-collapse: collapse; font-size: 14px;">
                                <thead>
                                    <tr style="border-bottom: 1px solid #ccc; text-align: left;">
                                        <th style="padding: 8px 0;">DESCRIPTION</th>
                                        <th style="padding: 8px 0;">UNIT PRICE</th>
                                        <th style="padding: 8px 0;">QTY</th>
                                        <th style="text-align: right; padding: 8px 0;">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody id="invoice-items">
                                    <!-- Dynamic rows inserted here -->
                                </tbody>
                                <tr style="border-top: 1px solid #ccc;">
                                    <td colspan="3" style="text-align: right; padding-top: 10px;">SUBTOTAL (Before Tax)
                                    </td>
                                    <td style="text-align: right; padding-top: 10px;">₹<span
                                            id="preview-subtotal">0.00</span></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align: right;">Tax (18%)</td>
                                    <td style="text-align: right;">₹<span id="preview-tax">0.00</span></td>
                                </tr>
                                <tr style="font-weight: bold;">
                                    <td colspan="3" style="text-align: right;">TOTAL</td>
                                    <td style="text-align: right;">₹<span id="preview-grandtotal">0.00</span></td>
                                </tr>
                            </table>

                            <div
                                style="margin-top: 50px; text-align: right; font-family: 'Brush Script MT', cursive; font-size: 20px;">
                                Garage Admin
                            </div>

                            <div style="margin-top: 40px; text-align: center;">
                                <button class="btn btn-secondary" type="button"
                                    onclick="stepper.previous()">Previous</button>
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>

                <!-- Add Customer Modal -->
                <div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog"
                    aria-labelledby="addCustomerModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form id="addCustomerForm" action="{{ route('customers-store') }}" method="POST">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New Customer</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Customer Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="text" name="mobile" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea name="address" class="form-control"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" name="city" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" name="state" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" name="country" class="form-control" required>
                                    </div>


                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Add Customer</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <!-- Add this in your layout or form blade -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>


    <script>
        var stepper = new Stepper(document.querySelector("#stepper"));

        function initializeSelect2(selector) {
            $(selector).select2({
                placeholder: "Search and select parts",
                allowClear: true,
                ajax: {
                    url: "{{ route('fetch-parts') }}",
                    dataType: 'json',
                    delay: 250,
                    data: params => ({
                        search: params.term || '',
                        page: params.page || 1
                    }),
                    processResults: data => ({
                        results: data.results.map(part => ({
                            id: part.id,
                            text: part.name,
                            rate: part.rate,
                            sale_rate: part.sale_rate || part.rate,
                            sgst: part.sgst,
                            cgst: part.cgst,
                            igst: part.igst,
                            hsn_code: part.hsn_code,
                            uom: part.uom
                        })),
                        pagination: {
                            more: data.pagination.more
                        }
                    }),
                    cache: true
                }
            }).on('select2:select', function(e) {
                let partData = e.params.data;
                let row = $(this).closest('.part-row');
                row.find('.rate').val(partData.rate);
                row.find('.sale').val(partData.sale_rate || partData.rate);
                row.find('.hsn_code').val(partData.hsn_code);
                row.find('.uom').val(partData.uom);
                updateTotal(row);
            });
        }

        function updateTotal(row) {
            let rate = parseFloat(row.find('.rate').val()) || 0;
            let quantity = parseFloat(row.find('.quantity').val()) || 1;

            let sgst = parseFloat(row.find('.sgst option:selected').val()) || 0;
            let cgst = parseFloat(row.find('.cgst option:selected').val()) || 0;
            let igst = parseFloat(row.find('.igst option:selected').val()) || 0;

            let taxPercent = sgst + cgst + igst;
            let taxAmount = (rate * quantity) * (taxPercent / 100);
            let totalAmount = (rate * quantity) + taxAmount;

            row.find('.total-cost').val(totalAmount.toFixed(2));
            updateInvoiceTotal();
        }

        function updateInvoiceTotal() {
            let total = 0;
            $('.total-cost').each(function() {
                total += parseFloat($(this).val()) || 0;
            });
            $('#invoice-total').text(total.toFixed(2));
        }

        function updateInvoicePreview() {
            const customerName = $('select[name="customer_id"] option:selected').text() || '--';
            const employeeName = $('select[name="employee_id"] option:selected').text() || '--';
            const deliveryDate = $('input[name="expected_delivery"]').val() || '--';

            $('#preview-customer-name').text(customerName);
            $('#preview-employee-name').text(employeeName);
            $('#preview-date').text(new Date().toISOString().split('T')[0]);
            $('#preview-due-date').text(deliveryDate);

            const tbody = $('#invoice-items');
            tbody.empty();

            let totalWithTax = 0;

            $('.part-row').each(function() {
                const row = $(this);
                const part = row.find('.part-select option:selected').text() || '-';
                const qty = parseFloat(row.find('.quantity').val()) || 0;
                const rate = parseFloat(row.find('.rate').val()) || 0;
                const total = qty * rate;

                totalWithTax += total;

                const tr = `
                <tr>
                    <td>${part}</td>
                    <td>₹${rate.toFixed(2)}</td>
                    <td>${qty}</td>
                    <td class="text-end">₹${total.toFixed(2)}</td>
                </tr>`;
                tbody.append(tr);
            });

            const taxRate = 0.18; // 18%
            const subtotal = totalWithTax / (1 + taxRate);
            const taxAmount = totalWithTax - subtotal;

            $('#preview-subtotal').text(subtotal.toFixed(2));
            $('#preview-tax').text(taxAmount.toFixed(2));
            $('#preview-grandtotal').text(totalWithTax.toFixed(2));
        }

        $(document).ready(function() {
            initializeSelect2('#parts-container .part-select:first');

            $('#parts-container').on('click', '#add_part', function() {
                const newRow = `
                <div class="input-group mb-2 part-row">
                    <select name="part_id[]" class="form-control part-select" required></select>
                    <input type="number" name="quantity[]" class="form-control quantity" value="1" placeholder="Qty">

                    <input type="text" name="rate[]" class="form-control rate" placeholder="Rate" readonly>
                    <input type="text" name="sale_rate[]" class="form-control sale rate" placeholder="Sale Rate" readonly>

                    <select name="sgst_id[]" class="form-control sgst" required>
                        <option value="">Select SGST</option>
                        @foreach ($gst as $gsts)
                            <option value="{{ $gsts->rate }}">{{ $gsts->code }} - {{ $gsts->rate }}%</option>
                        @endforeach
                    </select>

                    <select name="cgst_id[]" class="form-control cgst" required>
                        <option value="">Select CGST</option>
                        @foreach ($gst as $gsts)
                            <option value="{{ $gsts->rate }}">{{ $gsts->code }} - {{ $gsts->rate }}%</option>
                        @endforeach
                    </select>

                    <select name="igst_id[]" class="form-control igst" required>
                        <option value="">Select IGST</option>
                        @foreach ($gst as $gsts)
                            <option value="{{ $gsts->rate }}">{{ $gsts->code }} - {{ $gsts->rate }}%</option>
                        @endforeach
                    </select>

                    <input type="text" name="total_cost[]" class="form-control total-cost" placeholder="Total" readonly>
                    <button type="button" class="btn btn-danger remove-part">-</button>
                </div>`;

                $('#parts-container').append(newRow);
                initializeSelect2('#parts-container .part-select:last');
            });

            $('#parts-container').on('click', '.remove-part', function() {
                $(this).closest('.part-row').remove();
                updateInvoiceTotal();
            });

            $('#parts-container').on('input change', '.quantity, .sgst, .cgst, .igst', function() {
                const row = $(this).closest('.part-row');
                updateTotal(row);
            });

            document.querySelector('#step4')?.addEventListener("shown.bs-stepper", updateInvoicePreview);

            const nextButtons = document.querySelectorAll('button[onclick="stepper.next()"]');
            nextButtons.forEach(btn => {
                btn.addEventListener("click", () => {
                    setTimeout(() => {
                        if (document.querySelector('#step4')?.classList.contains(
                            'active')) {
                            updateInvoicePreview();
                        }
                    }, 300);
                });
            });
        });
    </script>


    <!-- Include jQuery and Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Enable Select2
            $('#customer_id').select2({
                placeholder: 'Search Customer'
            });

            // Customer dropdown selection
            $('#customer_id').on('change', function() {
                const customerId = $(this).val();

                if (customerId) {
                    $.ajax({
                        url: '/job/fetch-customer/' + customerId,
                        method: 'GET',
                        success: function(res) {
                            $('#customer_name').val(res.customer.name);
                            $('#customer_phone').val(res.customer.phone);
                            $('#customer_address').val(res.customer.address);

                            let jobHTML = '';
                            if (res.jobs.length > 0) {
                                res.jobs.forEach(job => {
                                    let partsList = job.parts && job.parts.length > 0 ?
                                        '<ul>' + job.parts.map(p =>
                                            `<li>${p.title} (Qty: ${p.pivot.quantity})</li>`
                                        ).join('') + '</ul>' : 'N/A';

                                    jobHTML += `
                                <div style="padding: 10px; border-bottom: 1px solid #ccc;">
                                    <strong>Date:</strong> ${job.created_at}<br>
                                    <strong>Status:</strong> ${job.status}<br>
                                    <strong>Car:</strong> ${job.carmodel ? job.carmodel.make : 'N/A'}<br>
                                    <strong>Parts:</strong> ${partsList}
                                </div>`;
                                });
                            } else {
                                jobHTML = '<em>No previous job history found.</em>';
                            }

                            $('#job-history-panel').html(jobHTML);
                        },
                        error: function(err) {
                            console.error(err.responseText);
                            alert('Failed to load customer data');
                        }
                    });
                } else {
                    $('#customer_name, #customer_phone, #customer_address').val('');
                    $('#job-history-panel').html('<em>No customer selected</em>');
                }
            });

            // VIN Search
            $('#vin_search').on('input', function() {
                const vin = $(this).val().trim();

                if (vin.length >= 5) {
                    $.ajax({
                        url: '/job/fetch-customer-by-vin',
                        method: 'GET',
                        data: {
                            vin
                        },
                        success: function(res) {
                            if (!res.customer) {
                                $('#customer_name, #customer_phone, #customer_address').val('');
                                $('#job-history-panel').html(
                                    '<em>No customer found for this VIN.</em>');
                                return;
                            }

                            $('#customer_name').val(res.customer.name);
                            $('#customer_phone').val(res.customer.phone);
                            $('#customer_address').val(res.customer.address);

                            $('#customer_id').val(res.customer.id).trigger('change');

                            let jobHTML = '';
                            if (res.jobs.length > 0) {
                                res.jobs.forEach(job => {
                                    let partsList = job.parts && job.parts.length > 0 ?
                                        '<ul>' + job.parts.map(p =>
                                            `<li>${p.title} (Qty: ${p.pivot.quantity})</li>`
                                        ).join('') + '</ul>' : 'N/A';

                                    jobHTML += `
                                <div style="padding: 10px; border-bottom: 1px solid #ccc;">
                                    <strong>Date:</strong> ${job.created_at}<br>
                                    <strong>Status:</strong> ${job.status}<br>
                                    <strong>Car:</strong> ${job.car ? job.car.make : 'N/A'}<br>
                                    <strong>Parts:</strong> ${partsList}
                                </div>`;
                                });
                            } else {
                                jobHTML = '<em>No previous job history found.</em>';
                            }

                            $('#job-history-panel').html(jobHTML);
                        },
                        error: function(err) {
                            console.error(err.responseText);
                            alert('VIN search failed.');
                        }
                    });
                }
            });
        });
    </script>





    {{-- script for add new customer without refreshing page --}}

    <script>
        document.getElementById('addCustomerForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent page reload

            let form = this;
            let formData = new FormData(form);

            fetch("{{ route('customers-store') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': form.querySelector('[name="_token"]').value,
                        'Accept': 'application/json' // Important for Laravel to return JSON
                    },
                    body: formData
                })
                .then(async response => {
                    if (!response.ok) {
                        const errorText = await response.text();
                        console.error('Server returned error response:', errorText);
                        throw new Error('Server responded with error');
                    }
                    return response.json(); // safely parse JSON if response is OK
                })
                .then(data => {
                    if (data.status === 'success') {
                        alert(data.message); // Show success message
                        $('#addCustomerModal').modal(
                        'hide'); // Close modal (make sure Bootstrap JS is included)
                        form.reset(); // Clear form
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Caught Error:', error);
                    alert('An error occurred, please try again.');
                });
        });
    </script>



    <script>
        $('#parts-container').on('change', '.gst-dropdown', function() {
            let row = $(this).closest('.part-row');
            updateTotal(row);
        });
    </script>

    {{-- 
this script used for auto filling --}}
    <script>
        $('select[name="customer_id"]').on('change', function() {
            const customerId = $(this).val();

            if (!customerId) return;

            $.ajax({
                url: `/fetch-latest-job/${customerId}`,
                method: 'GET',
                success: function(response) {
                    if (!response.success) {
                        console.log(response.message);
                        return;
                    }

                    const job = response.job;

                    // Fill Job Detail Fields (Step 2)
                    $('select[name="type"]').val(job.type).trigger('change');
                    $('select[name="insurance"]').val(job.insurance).trigger('change');
                    $('input[name="insurance_company"]').val(job.insurance_company);
                    $('input[name="policy"]').val(job.policy);
                    $('input[name="policy_number"]').val(job.policy_number);
                    $('select[name="status"]').val(job.status).trigger('change');
                    $('textarea[name="remarks"]').val(job.remarks);
                    $('input[name="start_time"]').val(job.start_time);
                    $('input[name="end_time"]').val(job.end_time);
                    $('input[name="expected_delivery"]').val(job.expected_delivery);

                    // Fill Employee Field (Step 1 or 2)
                    if (response.employee) {
                        $('select[name="employee_id"]').val(response.employee.id).trigger('change');
                    }

                    // Fill Parts (Step 3)
                    const partsContainer = $('#parts-container');
                    partsContainer.html(''); // clear previous rows

                    response.parts.forEach((part, index) => {
                        const partRow = `
                    <div class="input-group mb-2 part-row">
                        <select name="part_id[]" class="form-control part-select" required>
                            <option value="${part.id}" selected>${part.name}</option>
                        </select>
                        <input type="number" name="quantity[]" class="form-control quantity" value="${part.pivot.quantity}" placeholder="Qty">
                        <input type="text" name="rate[]" class="form-control rate" value="${part.pivot.rate}" readonly>
                        <input type="text" name="sale_rate[]" class="form-control sale rate" value="${part.pivot.rate}" readonly>
                        
                        <!-- Optional GST logic -->
                        <select name="sgst_id[]" class="form-control sgst"><option value="${part.sgst}">${part.sgst}%</option></select>
                        <select name="cgst_id[]" class="form-control cgst"><option value="${part.cgst}">${part.cgst}%</option></select>
                        <select name="igst_id[]" class="form-control igst"><option value="${part.igst}">${part.igst}%</option></select>

                        <input type="text" name="total_cost[]" class="form-control total-cost" value="0" readonly>
                        <button type="button" class="btn btn-danger remove-part">-</button>
                    </div>
                `;
                        partsContainer.append(partRow);
                    });

                    initializeSelect2('.part-select');
                },
                error: function() {
                    console.error('Failed to fetch job details');
                }
            });
        });
    </script>
@endsection
