<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;

class CommentList extends Component
{
    public $post_id;

    protected $listeners = ['commentAdded' => 'render'];

    public function render()
    {
        return view('livewire.comment-list', ['comments' => Comment::where('post_id', $this->post_id)->get()->sortByDesc('id')]);
    }
}
