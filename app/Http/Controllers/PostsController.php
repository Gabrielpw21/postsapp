<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::with('user')->inRandomOrder()->get();
        $response = [
            'allPosts' => $posts
        ];

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
        $post = DB::table('posts')
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->select('posts.*', 'users.name as user_name')
        ->where('user_id', '=', $id)->get(); 

        return response()->json(['postsUser' => $post]);
    }

    public function edit($id)
    {
        $post = Posts::find($id);
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $post = Posts::find($id);
        $request->validate([
            'textPost' => 'required'
        ]);

        $inputData = $request->all();

        $post->update($inputData);

        return response()->json(['success' => 'Publicação Editada com Sucesso']);
    }

    public function delete($id)
    {
        $post = Posts::find($id);
        $post->delete();
        return response()->json(['success'=> 'Publicação Deletado com Sucesso']);
    }
}
