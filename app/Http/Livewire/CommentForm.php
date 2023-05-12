<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CommentForm extends Component
{
    public $postID;
    public $content;
    
    public function render()
    {
        return view('livewire.comment-form');
    }
}
