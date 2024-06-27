<div>
    <div class="row row-cards">
        @forelse($posts as $post)
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <img src="/storage/images/post_images/{{$post->featured_image}}" alt="" class="card-img-top">
                <div class="card-body p-2">
                    <h3 class="m-9 mb-1">{{$post->post_title}}</h3>
                </div>
                <div class="d-files">
                    <a href="{{route('author.posts.edit-post',['post_id'=>$post->id])}}" class="card-btn">Edit</a>
                    <a href="{{route('author.posts.view-post',['post_id'=>$post->id])}}" class="card-btn">View</a>
                    <!-- <a href="" wire:click.prevent="deletePost({{$post->id}})" class="card-btn">Delete</a> -->
                </div>
            </div>
        </div>
        @empty
            <span class="text-danger">No post(s) found</span>
        @endforelse
    </div>
    <div class="d-bloc mt-2">
        {{$posts->links('livewire::simple-bootstrap')}}
    </div>
</div>
