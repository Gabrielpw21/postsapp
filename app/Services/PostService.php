<?php

namespace App\Services;

use App\Models\User;
use App\Models\Posts;
use Illuminate\Support\Facades\DB;

class PostService
{
    public function PostByUser($id)
    {
        $post = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name as user_name')
            ->where('user_id', '=', $id)->get();

        return response()->json(['postsUser' => $post]);
    }

    public function getPostForEdit($id)
    {
        $post = Posts::find($id);
        return response()->json($post);
    }

    public function editPost($id, $newText)
    {
        $post = Posts::find($id);
    
        $post->update(['textPost' => $newText]);
    
        return response()->json(['success' => 'Publicação Editada com Sucesso']);
    }
}
