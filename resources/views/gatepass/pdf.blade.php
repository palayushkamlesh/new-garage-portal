<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gate Pass</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 15px;
        }
        .logo {
            width: 80px;
            height: auto;
        }
        .company-details {
            margin-top: 10px;
        }
        .section {
            margin-top: 30px;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
        }
        .info-table td {
            padding: 8px;
            vertical-align: top;
        }
        .signature-box {
            margin-top: 60px;
            display: flex;
            justify-content: space-between;
        }
        .signature {
            text-align: center;
            width: 40%;
            border-top: 1px solid #000;
            padding-top: 5px;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{ asset('images/logo.png') }}" class="logo" alt="Logo">
        <div class="company-details">
            <h2>Sevak AutoMobile Pvt Ltd</h2>
            <p>123, Main Road, Ahmedabad, Gujarat, India - 380001</p>
            <p>Email: contact@nicegarage.com | Phone: +91-9876543210</p>
        </div>
    </div>

    <div class="section">
        <h3>Gate Pass</h3>
        <table class="info-table">
           <tr>
    <td><strong>Customer Name:</strong> {{ $job->customer->name ?? 'N/A' }}</td>
    <td><strong>Mobile:</strong> {{ $job->customer->mobile ?? 'N/A' }}</td>
</tr>
<tr>
    <td><strong>Email:</strong> {{ $job->customer->email ?? 'N/A' }}</td>
    <td><strong>Date:</strong> {{ \Carbon\Carbon::now()->format('d-m-Y') }}</td>
</tr>
<tr>
    <td><strong>Amount:</strong> ₹{{ $job->total_amount ?? '0.00' }}</td>
    <td><strong>Status:</strong> 
        <span style="color: {{ $job->payment_status == 'Paid' ? 'green' : 'red' }}">
            {{ ucfirst($job->payment_status) }}
        </span>
    </td>
</tr>

        </table>
    </div>

    <div class="signature-box">
        <div class="signature">Customer Signature</div>
        <div class="signature">Authority Signature</div>
    </div>

</body>
</html>
