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
                    <a href="{{route('user.posts.view-post',['post_id'=>$post->id])}}" class="card-btn">View</a>
                </div>
            </div>
        </div>
        @empty
            <span class="text-danger">No post(s) found</span>
        @endforelse
    </div>
</div>
