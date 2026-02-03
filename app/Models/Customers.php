<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'address',
        'city',
        'state',
        'country',
    ];

    public function cars()
{
    return $this->hasMany(Cars::class, 'customer_id');
}

public function jobs()
{
    return $this->hasMany(Jobs::class, 'customer_id');
}


}
