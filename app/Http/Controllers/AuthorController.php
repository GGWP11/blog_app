<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
// use Intervention\Image\Facades\Image;


class AuthorController extends Controller
{
    public function index(Request $request){
        return view('back.pages.home');
    }

    public function createPost(Request $request){
        $request->validate([
            'post_title'=>'required|unique:posts,post_title',
            'post_content'=>'required',
            'featured_image'=>'required|mimes:jpeg,jpg,png|max:1024',
        ]);

        if($request->hasFile('featured_image')){
            $path="images/post_images/";
            $file=$request->file('featured_image');
            $filename=$file->getClientOriginalName();
            $new_filename=time().'_'.$filename;

            $upload=Storage::disk('public')->put($path.$new_filename,(string)file_get_contents($file));

            if($upload){
                $post = new Post();
                $post->author_id=auth()->id();
                $post->post_title=$request->post_title;
                $post->post_slug=Str::slug($request->post_title);
                $post->post_content=$request->post_content;
                $post->featured_image=$new_filename;
                $saved=$post->save();

                if($saved){
                    return response()->json(['code'=>1,'msg'=>'New post has been successfully created.']);
                }else{
                    return response()->json(['code'=>3,'msg'=>'Something went wrong in saving post data.']);
                }
            }else{
                return response()->json(['code'=>3,'msg'=>'Something went wrong for uploading featured image.']);
            }
        }
    }

    public function editPost(Request $request){
        if(!request()->post_id){
            return abort(404);
        }else{
            $post = Post::find(request()->post_id);
            $data = [
                'post'=>$post,
                'pageTitle'=>'Edit Post',
            ];
            return view('back.pages.auth.edit_post',$data);
        }
    }

    public function updatePost(Request $request){
        if($request->hasFile('featured_image')){
            $request->validate([
                'post_title'=>'required|unique:posts,post_title,'.$request->post_id,
                'post_content'=>'required',
                'featured_image'=>'mimes:jpeg,jpg,png|max:1024',
            ]);

            $post = Post::find(request()->post_id);
            $path = "images/post_images/";
            $file = $request->file('featured_image');
            $filename = $file->getClientOriginalName();
            $new_filename = time().'_'.$filename;

            $upload = Storage::disk('public')->put($path.$new_filename,(string) file_get_contents($file));

            $post_thumbnails_path = $path.'thumbnails';

            if($upload){
                $old_post_image = Post::find($request->post_id)->featured_image;

                if($old_post_image!=null && Storage::disk('public')->exists($post.$old_post_image)){
                    Storage::disk('public')->delete($path.$old_post_image);

                    if(Storage::disk('public')->exists($path.'thumbnails/'.$old_post_image)){
                        Storage::disk('public')->delete($path.'thumbnails/'.$old_post_image);
                    }

                    if(Storage::disk('public')->exists($path.'thumbnails/'.$old_post_image)){
                        Storage::disk('public')->delete($path,'thumbnails/'.$old_post_image);
                    }
                }

                $post = Post::find($request->post_id);
                $post->post_title = $request->post_title;
                $post->post_slug = null;
                $post->post_content = $request->post_content;
                $post->featured_image = $new_filename;
                $saved = $post->save();

                if($saved){
                    return redirect('/author/posts/all')
                         ->with('status','Post has been successfully updated. Redirecting to home page in 5 seconds...')
                         ->header('refresh','5');
                }else{
                    return response()->json(['code'=>3,'msg'=>'Something went wrong for updating post.']);
                }

            }else{
                return response()->json(['code'=>3,'msg'=>'Error in uploading new featured image.']);
            }

        }else{
            $request->validate([
                'post_title'=>'required|unique:posts,post_title,'.$request->post_id,
                'post_content'=>'required',
            ]);

            $post = Post::find($request->post_id);
            $post->post_slug = null;
            $post->post_content = $request->post_content;
            $post->post_title = $request->post_title;
            $saved = $post->save();

            if($saved){
                return response()->json(['code'=>1,'msg'=>'Post has been successfully updated.']);
            }else{
                return response()->json(['code'=>3,'msg'=>'Something went wrong for updating post.']);
            }
        }
    }

    public function viewPost(Request $request){
        if(!request()->post_id){
            return abort(404);
        }else{
            $post = Post::find(request()->post_id);
            $data = [
                'post'=>$post,
                'pageTitle'=>'View Post',
            ];
            return view('back.pages.view-post',$data);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('author.login');
    }

}
