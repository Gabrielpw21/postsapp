<?php

namespace App\Services;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function ProductByUser($id)
    {
        $product = DB::table('products')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select('products.*', 'users.name as user_name')
            ->where('user_id', '=', $id)->get();

        return response()->json(['productsUser' => $product]);
    }

    public function getProductForEdit($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function editProduct($id, $newText)
    {
        $product = Product::find($id);
    
        $product->update(['name_product' => $newText]);
    
        return response()->json(['success' => 'Produto Editada com Sucesso']);
    }
}
