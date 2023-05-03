<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Review;
use App\Models\ReviewCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        // Create the rental
        $rental = new Rental();
        $rental->name = $request->name;
        $rental->address = $request->address;
        $rental->type = $request->type;
        $rental->save();

        // Create the review for the rental
        $review = new Review();
        $review->rental_id = $rental->id;
        $review->review = $request->review;
        $review->save();

        // Now add the categories
        foreach($request->categories as $category){
            ReviewCategory::store($review->id, $category['category_id'], $category['rating']);
        }
        
        return response()->json($review);
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
        $review = Review::find($id);

        if(!$review){
            return response()->json(['message' => "Review not found with id $id"], Response::HTTP_NOT_FOUND);
        }

        $review->delete();

        return response()->json(['message' => 'Review deleted.']);
    }
}
