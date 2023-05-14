<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Book;
use App\Models\Tag;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = DB::table('posts')->orderBy('id', 'desc')->simplePaginate(5);
        $books = Book::orderBy('title', 'asc')->get();
        $tags = Tag::all();
        return view('posts.index', ['posts' => $posts, 'books' => $books, 'tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::orderBy('title', 'asc')->get();
        $tags = Tag::all();
        return view('posts.create', ['books' => $books, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'content' => ['required', 'string', 'max:255'],
            'book_id' => ['required', 'exists:books,id'],
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
        $comments = $post->comments->sortByDesc('id');
        return view('posts.show', ['post' => $post, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $request->request->add(['user_id' =>  Auth::id()]);
        $request->request->add(['post_user_id' => $post->user_id]);

        if (Auth::user()->is_admin) {
            $validated = $request->validate([
                'content' => 'required|max:255',
            ]);
        }
        else {
            $validated = $request->validate([
                'content' => 'required|max:255',
                'user_id' => 'required|same:post_user_id',
            ],
            [
                'user_id.same' => 'Permission Denied: You are not the owner or Admin',
            ]);
        }

        $post->content = $request['content'];
        $post->save();
        session()->flash('status', 'success');
        return redirect()->route("posts.show", $post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        session()->flash('message', 'Post was deleted.');
        return redirect()->route('posts.index');
    }
}
