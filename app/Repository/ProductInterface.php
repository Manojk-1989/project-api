<?php

namespace App\Repository;

interface ProductInterface 
{
    public function getAllProducts();
    public function addProduct($collection = []);
}