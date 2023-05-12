<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Book;
use Carbon\Carbon;
use App\Notifications\PostInteraction;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $books = Book::orderBy('title', 'asc')->get();
        return view('posts.index', ['posts' => $posts, 'books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::orderBy('title', 'asc')->get();
        return view('posts.create', ['books' => $books]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'content' => ['required', 'string', 'max:255'],
            "book_id" => ['required', 'exists:books,id'],
        ]);

        $p = new Post;
        $p->content = $validatedData['content'];
        $p->book_id = $validatedData['book_id'];
        $p->user_id = Auth::id();
        $p->post_date = Carbon::now();
        $p->save();

        session()->flash('status', 'success');
        
        return redirect()->route("posts.index");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        $message_data = ['interaction' => "viewed", 'post' => $post];
        $post->user->notify(new PostInteraction($message_data));
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
