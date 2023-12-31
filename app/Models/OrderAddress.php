<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;

    protected $table = 'order_addresses';

    protected $fillable = ['address','latitude','longitude'];

    protected $hidden = ['created_at','updated_at'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'address_id');
    }
}
