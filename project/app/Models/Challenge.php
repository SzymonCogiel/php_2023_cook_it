<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{


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


}
