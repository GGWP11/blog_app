<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class UserAllPost extends Component
{
    use WithPagination;
    public $perPage = 10;

    public function mount(){
        $this->resetPage();
    }

    public function render()
    {
        $posts = auth()->user()->type==2 ? 
        Post::all() : 
        Post::where('author_id', auth()->id())->paginate($this->perPage);
        return view('livewire.user-all-post', compact('posts'));
    }
}