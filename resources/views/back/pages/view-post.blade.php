@extends('back.layout.pages-layout')
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
                <div class="form-hint">
                <br><br>
                <div class="">
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
                        <a href="{{route('author.posts.all_posts')}}" class="btn btn-primary w-100">
                          Go Back
                        </a>
                      </div>
              </div>
            </div>
          </div>
        </div>
@endsection