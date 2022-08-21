<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Attachement extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [ 'file_name',
                            'path',
                            'product_id',
                        ];

    public function product() {
        return $this->belongsTo(\App\Models\Product::class,'product_id','id');
    }
}
