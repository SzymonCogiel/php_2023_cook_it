<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function details()
    {
        return $this->hasOne(AuthorDetails::class);
    }
}
