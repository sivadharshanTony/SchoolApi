<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepositoryImpl implements ProductRepository{
    public function getAllProducts(){
        return Product::all();
    }
}


?>