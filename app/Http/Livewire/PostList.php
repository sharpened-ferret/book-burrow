<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class PostList extends Component
{
    use WithPagination;

    protected $listeners = ['postAdded' => 'render'];

    public function render()
    {
        return view('livewire.post-list', ['posts' => DB::table('posts')->orderBy('id', 'desc')->simplePaginate(5)]);
    }
}
