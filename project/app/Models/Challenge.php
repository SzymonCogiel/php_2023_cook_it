<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PharIo\Manifest\Author;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable = [
        'Author',
        'Dish',
        'Price',
        'Ingredients',
        'Allergens',
        'Level',
        'Note',
        'Challenger',
        'Photo',
        'Status',
        'Review',
        'StartDate',
        'FinalDate',
    ];

    public function author()
    {
        return $this->belongsTo(\App\Models\Author::class);
    }



}
