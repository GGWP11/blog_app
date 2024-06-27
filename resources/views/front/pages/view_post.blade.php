@extends('front.pages.pages-layout')
@section('pageTitle',isset($pageTitle)?$pageTitle:'Home')
@section('content')
<div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                    {{$post->post_title}}
                </h2>
                <div class="col" style="margin-top:30px;">
                    <img src="/storage/images/post_images/{{$post->featured_image}}" alt="" class="card-img-top">
                </div>
                <div>
                <p class="form-label" style="margin-top:30px;">{{$post->post_content}}</p>
                </div>
                <br><br><br>
                <div class="hr-text hr-text-center hr-text-spaceless">leave a comment</div>
                <div class="form-hint">
                <br><br>
                <div class="">
                    <h3>Add a comment...</h3>
                    <form action="{{route('store_review')}}" method="POST">
                      @csrf 
                      <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <input type="text" class="form-control" name="comment" id="comment" placeholder="Enter Comment">
                      </div>

                      <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select name="rating" id="rating" class="form-control">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                      </div>
                      <input type="hidden" name="post_id" value="{{$post->id}}">
                      <div class="d-flex">
                    <button type="submit" id="addCommentBtn" class="btn btn-primary ms-auto">Comment</button>
                  </div>
                    </form>
                    <br><br><br>
                    <div class="hr-text hr-text-center hr-text-spaceless">reviews</div>
                </div>
                <br><br><br>
                @foreach($post->comments as $comment)
                <div class="card p-3">
                        <div class="d-flex justify-content-between align-items-center">

                      <div class="user d-flex flex-row align-items-center">

                        <img src="./back/static/avatars/006f.jpg" width="30" class="user-img rounded-circle mr-2">
                        <span><small class="font-weight-bold text-primary">Rashida Jones</small> <small class="font-weight-bold">{{$comment->comment}}</small></span> 
                      </div>
                      <small>2 days ago</small>
                      </div>
                      <div class="action d-flex justify-content-between mt-2 align-items-center">
                        <div class="reply px-4">
                            <small>Rating: {{$comment->rating}}</small>
                        </div>
                        <div class="icons align-items-center">
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-check-circle-o check-icon"></i>
                        </div>
                      </div>
                    </div>
                @endforeach
              </div>
              <br>
                <div class="col-6 col-sm-4 col-md-2 col-xl py-3">
                        <a href="{{route('user.home')}}" class="btn btn-primary w-100">
                          Go Back
                        </a>
                      </div>
              </div>
            </div>
          </div>
        </div>
@endsection