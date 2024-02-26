<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::with('user')->inRandomOrder()->get();

        $response = ['allPosts' => $posts];
        return response()->json($response);
    }

    public function addPost(Request $request)
    {
        $request->validate([
            'textPost' => 'required', 
            'user_id' => 'required', 
            'dateFormat' => 'required'
        ]);

        $inputPost = $request->all();

        Posts::create($inputPost);
        return response()->json(['message' => 'Publicação Criada com Sucesso']);
    }

    public function getPostByUserId($id){
        return PostService::PostByUser($id);
    }

    public function edit($id)
    {
       return PostService::getPostForEdit($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['textPost' => 'required']);
    
        $inputData = $request->all();
    
        return PostService::editPost($id, $inputData['textPost']);
    }

    public function delete($id)
    {
        $post = Posts::find($id);
        $post->delete();
        return response()->json(['success'=> 'Publicação Deletado com Sucesso']);
    }
}
