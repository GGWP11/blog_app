<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class AllPosts extends Component
{
    use WithPagination;
    public $perPage = 10;
    
    protected $listeners = [
        "deletePostAction"
    ];

    public function mount(){
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.all-posts',[
            'posts'=>auth()->user()->type==1?
                Post::paginate($this->perPage):
                Post::where('author_id',auth()->id())->paginate($this->perPage)
        ]);
    }

    public function deletePost($id){
        $this->dispatchBrowserEvent('deletePost',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete this post.',
            'id'=>$id
        ]);
    }

    public function deletePostAction($id){
        $post = Post::find($id);
        $path = "images/post_images/";
        $featured_image = $post->featured_image;

        if($featured_image != null && Storage::disk('public')->exists($path.$featured_image)){
            if(Storage::disk('public')->exists($path.$featured_image)){
                Storage::disk('public')->delete($path.$featured_image);
            };
    
            // Storage::disk('public')->delete($path.$featured_image);
        }

        $delete_post = $post->delete();

        if($delete_post){
            $this->showToastr('Post has been successfully deleted.', 'success');
        }else{
            $this->showToastr('Something went wrong.', 'error');
        }
    }

    public function showToastr($message,$type){
        return $this->dispatchBrowserEvent('showToaster',[
            'type'=>$type,
            'message'=>$message
        ]);
    }

    
}
