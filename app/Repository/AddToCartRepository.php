<?php

namespace App\Repository;

use App\Repository\AddToCartInterface;
use App\Models\Product;
use App\Models\Cart;
use DB;


class AddToCartRepository implements AddToCartInterface
{  
    public function addToCart($collection = [])
    {
        try {
            //code...
            DB::beginTransaction();

            $addToCart = new Cart;
            $addToCart->product_id =$collection['product_id'];
            $addToCart->customer_id =1;
            $addToCart->save();

            if ($addToCart->exists) {
                # code...
                DB::commit();
                return true;
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

    public function getAllCartProducts()
        {
            try {
                //code...
                return Cart::where('customer_id','=',1)->leftJoin('products', 'carts.product_id', '=', 'products.id')->with('customer')->with('productImages')->get();
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    
}