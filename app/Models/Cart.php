<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use App\Models\Attachement;

class Cart extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [ 'product_id', 
                            'customer_id',
                            'purchase',
                            'confirm_date',
                            'placed_date',
                        ];

    public function customer() {
        return $this->belongsTo(\App\Models\User::class,'customer_id','id');
    }

    public function productImages() {
        return $this->hasOne(\App\Models\Attachement::class,'product_id','id');
    }
}
