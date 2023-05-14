<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PostInteraction;
use Carbon\Carbon;

class CommentForm extends Component
{
    public $post;
    public $content;
    
    protected $rules = [
        'content' => 'required|string|max:255',
    ];
    
    public function render()
    {
        return view('livewire.comment-form');
    }

    public function submit()
    {
        $this->validate();

        $c = new Comment;
        $c->content = $this->content;
        $c->user_id = Auth::id();
        $c->post_id = $this->post->id;  
        $c->post_date = Carbon::now();
        $c->save();

        $this->emit('commentAdded');
        session()->flash('status', 'success');
        $message_data = ['user' => $this->post->user, 'interaction' => "commented on", 'post' => $this->post];
        $this->post->user->notify(new PostInteraction($message_data));
        $this->content = null;
    }
}
