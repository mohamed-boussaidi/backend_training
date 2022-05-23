<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
         return response()->json($products);
     }
     public function store(Request $request)
     {
         $product = new Product;
         $product->nom = $request->input('nom');
         $product->type = $request->input('type');
         $product->modele = $request->input('modele');
         $product->prix = $request->input('prix');
         $product->image = $request->input('image');
         $product->save();

         return response()->json([
             'status'=> 200,
             'message'=>' produit Added Successful',
         ]);
     }
     public function getProductById($id)
     {
         $product = Product::find($id);
         return response()->json($product);

     }
     public function update(Request $request, $id)
     {
        $product = Product::find($id);
        $product->nom = $request->input('nom');
        $product->type = $request->input('type');
        $product->modele = $request->input('modele');
        $product->prix = $request->input('prix');
         $product->image = $request->input('image');

        $product->update();

         return response()->json([
             'status'=> 200,
             'message'=>'product Update Successfully',
         ]);
     }
     public function destroy($id)
     {
         $product = Product::find($id);
         $product -> delete();

         return response()->json([
             'status'=> 200,
             'message'=>'product deleted Successfully',
         ]);
     }
}

