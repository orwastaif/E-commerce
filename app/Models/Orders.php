<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function Order(){
        return $this->belongTo(Orders_details::class, 'id', 'order_id');
    }
}
