<?php

namespace App\Http\Controllers\api\v1\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function sendComment(Request $request) {
        $data = $request->validate([
            'text'=>['required', 'string'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'product_id' => ['required', 'integer', 'exists:products,id'],
        ]);

        $comment = Comment::create([
            'text'=>$data['text'],
            'user_id'=>$data['user_id'],
            'product_id'=>$data['product_id'],
        ]);

        return response()->json([
            'message'=>'Комментарий успешно создан',
            'comment'=>$comment,
        ]);
    }

    public function getCommentsById($product_id) {
        $comments = Comment::where('product_id', $product_id)->get();

        return response()->json(
            $comments
        );
    }

    public function updateComment($id, Request $request) {
        $data = $request->validate([
            'text'=>['required', 'string']
        ]);

        $comment = Comment::findOrFail($id);

        if ($comment->user_id !== $request->user()->id) {
            return response()->json([
                'message'=>'У вас нет прав для редактирования этого комментария'
            ]);
        }; 
        
        $comment->update([
            'text'=>$data['text'],
        ]);

        return response()->json(
            $comment,
        );
    }
}
