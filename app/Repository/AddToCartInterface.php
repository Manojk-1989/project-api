<?php

namespace App\Repository;

interface AddToCartInterface 
{
    public function addToCart($collection = []);
    public function getAllCartProducts();

}