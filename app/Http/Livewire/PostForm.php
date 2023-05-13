<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Post;

class PostForm extends Component
{
    use WithFileUploads;
    
    public $books;
    public $content;
    public $book_id;
    public $image;

    protected $rules = [
        'content' => 'required|string|max:255',
        'book_id' => 'required|exists:books,id',
    ];

    protected $messages = [
        'book_id.required' => 'Please select a book.'
    ];

    public function render()
    {
        return view('livewire.post-form', );
    }

    public function submit()
    {
        $this->validate();

        $p = new Post;
        $p->content = $this->content;
        $p->book_id = $this->book_id;
        $p->user_id = Auth::id();
        $p->post_date = Carbon::now();
        $p->save();

        if ($this->image){
            $this->image->storeAs('images/posts', $p->id.'.'.$this->image->extension());
            $p->has_image = true;
            $p->save();
        }
        

        $this->emit('postAdded');
        session()->flash('status', 'success');
        $this->content="";
    }
}
