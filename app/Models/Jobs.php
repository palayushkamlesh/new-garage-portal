<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Jobs extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'car_id',
        'type',
        'insurance_company',
        'policy_number',
        'start_time',
        'end_time',
        'expected_delivery',
        'status',
        'remarks',
        'employee_id',
        //'gst_id',
        
        // 'job_id',
        // 'part_id',
        // 'quantity',
        // 'rate',
        // 'sale_rate',
        // 'cgst',
        // 'sgst	',
        // 'igst',
        // 'total',
        // 'uom',
        // 'hsn_code',
        // 'status',   
        'totalcost'  
    ];

    // Fix relationship with Customer
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id'); 
    }

    // Fix relationship with Car Model
    public function carmodel(): BelongsTo
    {
        return $this->belongsTo(CarModels::class, 'car_id', 'id'); 
        
    }


    // Fix relationship with Part
    // public function part(): BelongsTo
    // {
    //     return $this->belongsTo(Parts::class, 'part_id', 'id'); 
        
    // }

    public function parts() {
        return $this->belongsToMany(Parts::class, 'job_part', 'job_id', 'part_id')
                    ->withPivot(['quantity', 'rate', 'sale_rate', 'cgst', 'sgst', 'igst', 'total', 'uom', 'hsn_code', 'status'])
                    ->withTimestamps();
    }
    

    // Fix relationship with Employee
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employees::class, 'employee_id', 'id'); 
       
    }

    public function gst(): BelongsTo
    {
        return $this->belongsTo(Gst::class, 'gst_id', 'id'); 
       
    }
    


    public function car()
{
    return $this->belongsTo(Cars::class, 'car_id');
}

}

