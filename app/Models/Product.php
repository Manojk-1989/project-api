<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attachement;
use App\Models\Cart;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [ 'product_name', 
                            'price',
                            'product_description',
                            'created_by', 
                            'created_by',
                            'updated_by',
                        ];

    public function productImages() {
        return $this->hasMany(\App\Models\Attachement::class,'product_id','id');
    }

    
}
