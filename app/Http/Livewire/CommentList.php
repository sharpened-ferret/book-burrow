<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CommentList extends Component
{
    public $comment;
    public $userName;
    public $userID;

    public function render()
    {
        return view('livewire.comment-list');
    }
}
