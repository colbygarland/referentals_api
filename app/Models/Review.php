<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected function categories(): Attribute {
        // TODO: go through the ReviewCateogires here and get the name and rating to return
        return Attribute::make(
            get: fn () => ['name' => 'TODO', 'rating' => 5],
        );
    }
}
