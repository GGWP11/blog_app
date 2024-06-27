<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function storeReview(Request $request){
        $validatedData = $request->validate([
            'comment'=>'required|string|max:255',
            'rating'=>'required|integer|min:1|max:5',
            'post_id'=>'required|exists:posts,id'
        ]);

        $review = new Reviews([
            'comment'=>$validatedData['comment'],
            'rating'=>$validatedData['rating'],
            'post_id'=>$validatedData['post_id']
        ]);

        $review->save();

        return redirect()->back()->with('success','Your review has been added.');
    }
}
