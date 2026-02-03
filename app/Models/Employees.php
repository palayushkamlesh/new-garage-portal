<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employees extends Model
{
    use HasFactory;
       /**
      * The attributes that are mass assignable.
      *
      * @var array<int, string>
      */
     protected $fillable = [
         'name',
         'phone',
         'email',
         'employeetypes_id',
         'hourly_rate',
     ];
 
     /**
  * 
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  */
 
 
 public function employeetypes(): BelongsTo
 {
     return $this->belongsTo(EmployeeTypes::class, 'employeetypes_id' , 'id');
 }
}
