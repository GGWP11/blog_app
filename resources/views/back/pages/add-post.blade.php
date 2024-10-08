@extends('back.layout.pages-layout')
@section('pageTitle',isset($pageTitle)?$pageTitle:'Add new post')
@section('content')
<div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Add new post
                </h2>
              </div>
            </div>
          </div>
        </div>

        <form action="{{route('author.posts.create')}}" method="post" id="addPostForm" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-9">
                    <div class="mb-3">
                              <label class="form-label">Post Title</label>
                              <input type="text" class="form-control" name="post_title" placeholder="Enter post title">
                              <span class="text-danger error-text post_title_error"></span>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Post content</label>
                              <textarea class="form-control" name="post_content" rows="6" placeholder="Content.."></textarea>
                              <span class="text-danger error-text post_content_error"></span>
                            </div>
                    </div>
                    <div class="col-md-3">
                    <div class="mb-3">
                            <div class="mb-3">
                            <div class="form-label">Featured image</div>
                            <input type="file" class="form-control" name="featured_image">
                            <span class="text-danger error-text featured_image_error"></span>
                        </div>
                          <button type="submit" class="btn btn-primary">Save post</button>
                    </div>
                    </div>
                </div>
            </div>
        </form>
@endsection
@push('scripts')

<script>
    $(function(){
        $('input[type="file"][name="featured_image"]')({
            imageShape:'rectangular',
            allowedExtensions:['jpg','jpeg','png'],
            onErrorShape:function(message,element){
                alert(message);
            },
            onInvalidType:function(message,element){
                alert(message);
            }
        });

        $('form#addPostForm').on('submit',function(e){
            e.preventDefault();
            toastr.remove();
            var form = this;
            var fromdata = new FormData(form);

            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:fromdata,
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.error-text').text('');
                },
                success:function(response){
                    toastr.remove();
                    if(response.code==1){
                        $(form)[0].reset();
                        toastr.success(response.msg);
                    }else{
                        toastr.error(response.msg);
                    }
                },
                error:function(response){
                    toastr.remove();
                    $.each(response.responseJSON.errors,function(prefix,val){
                        $(form).find('span.'+prefix+'_error').text(val[0]);
                    });
                }
        });
        })

    });
</script>

@endpush