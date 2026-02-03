<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Parts extends Model
{
    use HasFactory;
    // Allow mass assignment for these fields
    protected $fillable = [
        'name',
        'code',
        'type',
        'uom',
        'rate',
        'sale_rate',
        'purchase_rate',
        'status',
        'description',
        'group_name',
        'hsn_code',
        'sgst',
        'cgst',
        'igst',
        'vor_rate',
    ];

//     public function jobs(): BelongsToMany
// {
//     return $this->belongsToMany(Jobs::class, 'job_part')
//                 ->withPivot('quantity', 'rate', 'total')
//                 ->withTimestamps();
// }

public function jobs()
    {
        return $this->belongsToMany(Jobs::class, 'job_part','part_id', 'job_id')
                    ->withPivot('quantity', 'rate', 'sale_rate', 'sgst', 'cgst', 'igst', 'total_cost')
                    ->withTimestamps();
    }
}
