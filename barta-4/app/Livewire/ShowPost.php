<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class ShowPost extends Component
{
    use WithPagination;

    public $postCount = 5;

    public function loadMore()
    {
        $this->postCount = $this->postCount + 5;
    }

    public function render()
    {
        $posts = Post::with('user')->cursorPaginate($this->postCount);

        return view('livewire.show-post')->with('posts', $posts);
    }
}
