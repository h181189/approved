<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\User;
use App\Comment;
use Auth;

class ReviewController extends Controller
{

    public function __construct() {
        $this->middleware('editor', ['except' => ['index', 'show']]);
    }
    
    /**
    * An overview of the resource.
    *
    * @return  /Illuminate/Http/Response
    */
    public function overview()
    {
        $reviews = Auth::user()->review()->get();
        return view('reviews.overview', compact('reviews'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $app = \App\App::where('name', $request->app)->first();
        if ($app == null) {
            $app = new \App\App;
            $app->name = $request->app;
            $app->developer = "";
            $app->url = "";
            $app->save();
        }

        $score = new \App\Score;
        $score->functionality = $request->functionality_rating;
        $score->interface = $request->interface_rating;
        $score->price = $request->price_rating;
        $score->total = round(($request->functionality_rating + $request->interface_rating + $request->price_rating) / 30) * 10;
        $score->save();

        $review = new \App\Review;
        $review->user_id = $request->user()->id;
        $review->app_id = $app->id;
        $review->score_id = $score->id;
        $review->content = $request->content;

        $review->save();
        return redirect('reviews/' . $review->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $app = \App\App::where('name', $request->app)->first();
        if ($app == null) {
            $app = new \App\App;
            $app->name = $request->app;
            $app->developer = "";
            $app->url = "";
            $app->save();
        }

        $review->score->functionality = $request->functionality_rating;
        $review->score->interface = $request->interface_rating;
        $review->score->price = $request->price_rating;
        $review->score->total = round(($request->functionality_rating + $request->interface_rating + $request->price_rating) / 30) * 10;
        $review->score->save();

        $review->app_id = $app->id;
        $review->content = $request->content;
        $review->save();

        return redirect('reviews/' . $review->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->score->delete();
        $review->delete();
        return redirect('/reviews');
    }

    /**
    * Stores a comment to the resource.
    *
    * @return /Illuminate/Http/Response
    */
    public function store_comment(Request $request) {
        $comment = Comment::create([
            'user_id' => Auth::user()->id,
            'review_id' => $request->review,
            'content' => $request->content]);
        $comment->save();
        return redirect('/reviews/' . $request->review);
    }
}
