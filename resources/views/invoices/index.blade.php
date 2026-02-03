<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 40px;
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
        border: 1px solid #eee;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
        border-collapse: collapse;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr.heading td {
        background: #f7f7f7;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.total td {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    .text-end {
        text-align: right;
    }

    .mt-4 { margin-top: 1.5rem; }
    .signature {
        margin-top: 60px;
        text-align: right;
        font-family: 'Cursive';
        font-size: 20px;
    }
</style>

<div class="invoice-box">
    <h2 style="text-align:right;">INVOICE</h2>
    <hr>

    <table>
        <tr>
            <td>
                <strong>ISSUED TO:</strong><br>
                <span id="preview-customer-name">Richard Sanchez</span><br>
                <span id="preview-customer-company">Thynk Unlimited</span><br>
                <span id="preview-customer-address">123 Anywhere St., Any City</span>
            </td>
            <td class="text-end">
                <strong>INVOICE NO:</strong> <span id="preview-invoice-no">01234</span><br>
                <strong>DATE:</strong> <span id="preview-date">11.02.2030</span><br>
                <strong>DUE DATE:</strong> <span id="preview-due-date">11.03.2030</span>
            </td>
        </tr>
    </table>

    <div class="mt-4">
        <strong>PAY TO:</strong><br>
        <span id="preview-bank-name">Borcele Bank</span><br>
        Account Name: <span id="preview-employee-name">Adeline Palmerston</span><br>
        Account No.: <span id="preview-account-no">0123 4567 8901</span>
    </div>

    <table class="mt-4">
        <thead>
            <tr class="heading">
                <td>DESCRIPTION</td>
                <td>UNIT PRICE</td>
                <td>QTY</td>
                <td class="text-end">TOTAL</td>
            </tr>
        </thead>
        <tbody id="invoice-items">
            <!-- Items will be dynamically injected here -->
        </tbody>
        <tr class="total">
            <td colspan="3" class="text-end">SUBTOTAL</td>
            <td class="text-end">$<span id="preview-subtotal">0.00</span></td>
        </tr>
        <tr>
            <td colspan="3" class="text-end">Tax</td>
            <td class="text-end">10%</td>
        </tr>
        <tr class="total">
            <td colspan="3" class="text-end">TOTAL</td>
            <td class="text-end">$<span id="preview-grandtotal">0.00</span></td>
        </tr>
    </table>

    <div class="signature">
        Adeline Palmerston
    </div>
</div>
