<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PostInteraction;
use App\Models\User;
use App\Models\Post;

class PostLike extends Component
{
    public $post;
    public $activeLike;
    public $count;

    public function like(): void
    {
        if ($this->activeLike) 
        {
            $this->post->likedBy()->detach(Auth::id());
        }
        else {
            $this->post->likedBy()->attach(Auth::id());
            $message_data = ['user' => $this->post->user, 'interaction' => "liked ", 'post' => $this->post];
            $this->post->user->notify(new PostInteraction($message_data));
        }
        
    }

    public function render()
    {
        $this->activeLike = DB::table('likeables')
            ->select('user_id')
            ->where('likeable_type', "App\Models\Post")
            ->where('likeable_id', $this->post->id)
            ->where('user_id', Auth::id())
            ->exists();

        $this->count = $this->post->likedBy()->count();
        
        return view('livewire.post-like');
    }
}
