<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostList extends Component
{
    public $postContent;
    public $postID;

    public function render()
    {
        return view('livewire.post-list');
    }
}
