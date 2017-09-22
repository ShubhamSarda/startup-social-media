<?php
namespace App\Http\Controllers;

use DB;
use App\Post;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;


class PostController extends Controller
{
    public function getDashboard()
    {
        $comments = Comment::orderBy('created_at', 'desc')->paginate(10);
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard', ['posts' => $posts, 'comments' => $comments, 'users' => $users]);
    }


    public function postCreatePost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);
        $post = new Post();
        $post->body = $request['body'];
        $message = 'There was an error';
        if ($request->user()->posts()->save($post)) {
            $message = 'Post successfully created!';
        }
        return redirect()->route('dashboard')->with(['message' => $message]);
    }

    public function postCreateComment(Request $request,$post_id)
    {
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);
        $comment = new Comment();
        $comment->post_id = $post_id;
        $comment->body = $request['body'];
        $message = 'There was an error';
        if ($request->user()->comments()->save($comment)) {
            $message = 'Comment successfully created!';
        }
        return redirect()->route('dashboard')->with(['message' => $message]);
    }

    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Successfully deleted!']);
    }

    public function postEditPost(Request $request)
    {
        $this->validate($request, [
           'body' => 'required'
        ]);
        $post = Post::find($request['postId']);
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body' => $post->body], 200);
    }
    public function getUserprofile($username,$id)
    {

      $posts = Post::orderBy('created_at', 'desc')->paginate(10);
      return view('Userprofile', ['posts' => $posts],compact('username','id'));
    }
}
