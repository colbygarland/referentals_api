<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $appends = [
        'categories',
        'rental',
        'rating',
    ];

    protected $hidden = [
        'rental_id'
    ];

    protected function getCategoriesAttribute() {
        $reviewCategories = ReviewCategory::where('review_id', $this->id)->get();

        $categories = [];
        foreach($reviewCategories as $reviewCategory){
            $category = Category::find($reviewCategory->category_id);
            array_push($categories, [
                'name' => $category->name,
                'rating' => $reviewCategory->rating
            ]);
        }

        return $categories;
    }

    protected function getRentalAttribute() {
        $rental = Rental::find($this->rental_id);
        return $rental;
    }

    protected function getRatingAttribute() {
        $categories = $this->getCategoriesAttribute();
        $ratings = [];
        foreach($categories as $category) {
            $ratings[] = $category['rating'];
        }

        return array_sum($ratings) / count($ratings);
    }
}
