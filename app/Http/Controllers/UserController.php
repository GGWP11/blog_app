<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request){
        return view('front.pages.home');
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
            return view('front.pages.view_post',$data);
        }
    }
}
