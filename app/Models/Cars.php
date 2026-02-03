<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cars extends Model
{
    use HasFactory;
    /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
      'customer_id',
      'model_id',
      'license_plate',
      'vin',
      'color',
      'mileage',
      'fuel_type',
      'transmission',
  ];

   /**
  * 
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  */
 
 
 public function customers(): BelongsTo
 {
     return $this->belongsTo(Customers::class, 'customer_id' , 'id');
 }

 public function carmodels(): BelongsTo
 {
     return $this->belongsTo(CarModels::class, 'model_id' , 'id');
 }

 public function jobs()
{
    return $this->hasMany(Jobs::class, 'car_id');
}


public function customer()
{
    return $this->belongsTo(Customers::class, 'customer_id');
}


}


