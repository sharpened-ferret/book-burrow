<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;
use App\Services\BookFetch;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = DB::table('books')->orderBy('id', 'desc')->simplePaginate(6);
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(BookFetch $b)
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, BookFetch $b)
    {
        $validatedData = $request->validate([
            'isbn' => ['required', 'string', 'max:255'],
        ]);

        $bookData = $b->fetch($validatedData['isbn']);

        if ($bookData != null) {
            $book = new Book;
            $book->isbn = $bookData['identifiers']['isbn_10'][0];
            $book->title = $bookData['title'];
            $book->author = $bookData['authors'][0]['name'];
            $book->save();

            session()->flash('status', 'success');
            return redirect()->route("books.index");
        } else {
            return redirect('books/create')
                        ->withErrors(["isbn" => "Invalid ISBN"])
                        ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', ['book' => $book]);
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
