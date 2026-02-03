<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Helvetica Neue', sans-serif;
            color: #333;
            font-size: 14px;
            margin: 40px;
        }
        h2 {
            text-align: right;
            font-size: 32px;
            letter-spacing: 2px;
        }
        .line {
            border-top: 1px solid #000;
            margin-bottom: 30px;
        }
        .section {
            margin-bottom: 30px;
        }
        .flex {
            display: flex;
            justify-content: space-between;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            padding: 8px 12px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        .table th {
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
        }
        .right {
            text-align: right;
        }
        .summary {
            margin-top: 30px;
            width: 300px;
            float: right;
        }
        .summary td {
            padding: 5px 0;
        }
        .signature {
            margin-top: 80px;
            float: right;
            font-family: cursive;
        }
    </style>
</head>
<body>

    <h2>INVOICE</h2>
    <div class="line"></div>

    <div class="section flex">
        <div>
            <strong>ISSUED TO:</strong><br>
            {{ $job->customer->name }}<br>
            {{ $job->customer->address ?? 'Address not provided' }}<br>
            Phone: {{ $job->customer->mobile ?? 'N/A' }}
        </div>

        <div>
            <strong>INVOICE NO:</strong> {{ $job->id }}<br>
            <strong>DATE:</strong> {{ \Carbon\Carbon::parse($job->start_time)->format('d.m.Y') }}<br>
            <strong>DUE DATE:</strong> {{ \Carbon\Carbon::parse($job->end_time)->format('d.m.Y') }}
        </div>
    </div>

    <div class="section">
        <strong>PAY TO:</strong><br>
        {{ $job->employee->name ?? 'Technician Not Assigned' }}<br>
        {{ $job->employee->bank_name ?? 'Bank Name' }}<br>
        Account No.: {{ $job->employee->account_no ?? 'XXXX-XXXX-XXXX' }}
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Description</th>
                <th>Unit Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($partsData as $part)
            <tr>
                <td>{{ $part['name'] }}</td>
                <td>{{ number_format($part['sale_rate'], 2) }}</td>
                <td>{{ $part['quantity'] }}</td>
                <td class="right">${{ number_format($part['total'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="summary">
        <tr>
            <td><strong>SUBTOTAL:</strong></td>
            <td class="right">${{ number_format($grandTotal, 2) }}</td>
        </tr>
        <tr>
            <td><strong>Tax (10%):</strong></td>
            <td class="right">${{ number_format($grandTotal * 0.10, 2) }}</td>
        </tr>
        <tr>
            <td><strong>TOTAL:</strong></td>
            <td class="right"><strong>${{ number_format($grandTotal * 1.10, 2) }}</strong></td>
        </tr>
    </table>

    {{-- <div class="signature">
        {{ $job->employee->name ?? 'Authorized Signatory' }}
    </div> --}}

</body>
</html>
