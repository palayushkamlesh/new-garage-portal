<?php

namespace App\Imports;

use App\Models\Parts;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;



namespace App\Imports;

use App\Models\Parts;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class PartsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $data = [];
        $batchSize = 1000; // Insert data in batches to optimize performance

        foreach ($rows as $key => $row) {
            if ($key == 0) continue; // Skip header row

            $data[] = [
                'name'          => $row[0] ?? 'Unknown Part',
                'code'          => $row[1] ?? null, // Assuming code should be unique
                'type'          => $row[2] ?? 'Parts',
                'uom'           => $row[3] ?? 'PCS', // Default Unit of Measurement
                'rate'          => isset($row[4]) ? floatval($row[4]) : 0.00,
                'sale_rate'     => isset($row[5]) ? floatval($row[5]) : 0.00,
                'purchase_rate' => isset($row[6]) ? floatval($row[6]) : 0.00,
                'status'        => $row[7] ?? 'ACTIVE',
                'description'   => $row[8] ?? null,
                'group_name'    => isset($row[9]) && trim($row[9]) !== '' ? trim($row[9]) : 'Default Group',
                'hsn_code'      => isset($row[10]) ? intval($row[10]) : 8708, // HSN Code must be an integer
                'sgst'          => isset($row[11]) ? min(floatval($row[11]), 999.99) : 0.00,
                'cgst'          => isset($row[12]) ? min(floatval($row[12]), 999.99) : 0.00,
                'igst'          => isset($row[13]) ? floatval($row[13]) : 0.00,
                'vor_rate'      => isset($row[14]) ? floatval($row[14]) : 0.00,
                'created_at'    => now(),
                'updated_at'    => now(),
            ];

            // Insert data in batches to avoid memory issues
            if (count($data) >= $batchSize) {
                Parts::insert($data);
                $data = []; // Reset data array
            }
        }

        // Insert remaining data
        if (!empty($data)) {
            Parts::insert($data);
        }
    }
}
