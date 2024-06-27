@extends('front.pages.pages-layout')
@section('pageTitle',isset($pageTitle)?$pageTitle:'Home')
@section('content')
<div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  All Posts
                </h2>
              </div>
            </div>
          </div>
        </div>
        @livewire('user-all-post')
@endsection