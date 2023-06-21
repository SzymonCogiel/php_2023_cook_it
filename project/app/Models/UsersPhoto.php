<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersPhoto extends Model
{
    use HasFactory;
    protected $table = 'users_photos';
    protected $primaryKey = 'id';
    protected $fillable=['image','user_id','username'];
}
