<?php

namespace App\Repository;

use App\Repository\ProductInterface;
use App\Models\Product;
use DB;
use App\Http\Traits\FileManagerTrait;


class ProductRepository implements ProductInterface
{  
    use FileManagerTrait;
    
    public function getAllProducts()
        {
            try {
                //code...
                return Product::with('productImages')->get();
            } catch (\Throwable $th) {
                //throw $th;
            }
            
        }

    public function addProduct($collection = [])
    {
        try {
            //code...
            DB::beginTransaction();

            $createProduct = new Product;
            $createProduct->product_name =$collection['product_name'];
            $createProduct->price =$collection['price'];
            $createProduct->product_description =$collection['product_description'];
            $createProduct->created_by = 1;
            $createProduct->save();

            if ($createProduct->exists) {
                # code...
                DB::commit();

                $fileUpload = $this->fileUpload($collection['file'],$createProduct->id);

                if ($fileUpload) {
                    # code...
                    return true;
                } else {
                    # code...
                    Product::where('id','=',$createProduct->id)->delete();
                    return false;
                }
                
            } else {
                # code...
                DB::rollback();
                return false;
            }
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
            
    }
    
}