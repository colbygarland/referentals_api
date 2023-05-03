<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewCategory extends Model
{
    use HasFactory;

    public static function store($reviewId, $categoryId, $rating){
        $reviewCategory = new ReviewCategory();
        $reviewCategory->review_id = $reviewId;
        $reviewCategory->category_id = $categoryId;
        $reviewCategory->rating = $rating;
        $reviewCategory->save();
        return $reviewCategory;
    }
}
