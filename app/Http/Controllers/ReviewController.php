<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ReviewCategory;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();
        return response()->json($reviews);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $review = new Review();
        $review->name = $request->name;
        $review->address = $request->address;
        $review->review = $request->review;
        $review->save();

        // now add the categories
        foreach($request->categories as $category){
            ReviewCategory::store($review->id, $category['category_id'], $category['rating']);
        }
        return response()->json($review);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
