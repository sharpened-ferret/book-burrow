<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Tag;

class PostForm extends Component
{
    use WithFileUploads;
    
    public $books;
    public $tags;
    public $content;
    public $book_id;
    public $tag_ids;
    public $image;
    public $iteration;

    protected $rules = [
        'content' => 'required|string|max:255',
        'book_id' => 'required|exists:books,id',
        'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
        'tag_ids' => 'nullable|array'
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

        foreach ($this->tag_ids as $tag_id){
            $t = Tag::find($tag_id);

            if ($t != null) {
                $p->tags()->attach($t->id);
            }
            
        }

        if ($this->image){
            $this->image->storeAs('images/posts', $p->id.'.'.$this->image->extension());
            $p->image = $p->id.".".$this->image->extension();
            $p->save();
        }
        

        $this->emit('postAdded');
        session()->flash('status', 'success');

        // Reset Form fields after submission
        $this->content="";
        $this->iteration++;
    }
}
