<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use Carbon\Carbon;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => ['required', 'string', 'max:255'],
            'post_id' => ['required', 'exists:posts,id'],
        ]);

        $c = new Comment;
        $c->content = $validatedData['content'];
        $c->user_id = Auth::id();
        $c->post_id = $validatedData['post_id'];
        $c->post_date = Carbon::now();
        $c->save();

        session()->flash('status', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::findOrFail($id);
        $request->request->add(['user_id' =>  Auth::id()]);
        $request->request->add(['comment_user_id' => $comment->user_id]);

        if (Auth::user()->is_admin) {
            $validated = $request->validate([
                'content' => 'required|max:255',
            ]);
        }
        else {
            $validated = $request->validate([
                'content' => 'required|max:255',
                'user_id' => 'required|same:comment_user_id',
            ],
            [
                'user_id.same' => 'Permission Denied: You are not the owner or Admin',
            ]);
        }

        $comment->content = $request['content'];
        $comment->save();
        session()->flash('status', 'success');
        return redirect()->route("posts.show", $comment->post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
