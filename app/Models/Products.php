<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Products extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = ['id','title','description','category','price','photo'];

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'price',
        'photo',
        
    ];
    public function oredr_details(){
        return $this->hasMany(Order_details::class, 'product_id', 'user_id');
    }

}
