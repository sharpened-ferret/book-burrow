<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentLike extends Component
{
    public $comment;
    public $activeLike;
    public $count;

    public function like(): void
    {
        if ($this->activeLike) 
        {
            $this->comment->likedBy()->detach(Auth::id());
        }
        else {
            $this->comment->likedBy()->attach(Auth::id());
        }
        
    }

    public function render()
    {
        $this->activeLike = DB::table('likeables')
            ->select('user_id')
            ->where('likeable_type', "App\Models\Comment")
            ->where('likeable_id', $this->comment->id)
            ->where('user_id', Auth::id())
            ->exists();

        $this->count = $this->comment->likedBy()->count();

        return view('livewire.comment-like');
    }
}
