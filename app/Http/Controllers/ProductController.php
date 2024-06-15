<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('user')->inRandomOrder()->get();

        $response = ['allProducts' => $products];
        return response()->json($response);
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'name_product' => 'required',
            'img_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required',
            'user_id' => 'required', 
        ]);
        
        $imageName = time() . '.' . $request->img_path->getClientOriginalExtension();
        if(!Storage::exists(public_path('uploads'))){
            Storage::makeDirectory('public/uploads');
            $request->img_path->move('storage/uploads', $imageName);
        }
        
        $product = new Product();
        $product->name_product = $request->name_product;
        $product->price = $request->price;
        $product->user_id = $request->user_id;
        $product->img_path = 'storage/uploads/' . $imageName;
        
        $product->save();
    
        return response()->json(['message' => 'Produto criado com sucesso']);

    }

    public function getProductsByUserId($id){

        $productService = new ProductService();

        return $productService->ProductByUser($id);
    }

    public function edit($id)
    {
       $productService = new ProductService();
       return $productService->getProductForEdit($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name_product' => 'required']);
        $inputData = $request->all();
        $productService = new ProductService();
        return $productService->editProduct($id, $inputData['name_product']);
    }

    public function delete($id)
    {
        $post = Product::find($id);
        $post->delete();
        return response()->json(['success'=> 'Publicação Deletado com Sucesso']);
    }

    
}
