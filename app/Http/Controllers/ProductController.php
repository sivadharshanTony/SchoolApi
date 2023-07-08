<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ProductRepository;

class ProductController extends Controller
{
   public $product;
   public function _construct(ProductRepository $product){
      $this->$product=$product;
   }
   public function index(){
     $products= $this->$product->getAllProducts();
      return view('product.index')->with('products', $products);
   }
   public function showAll()
   {
       return view('students.index');
   }
}
 