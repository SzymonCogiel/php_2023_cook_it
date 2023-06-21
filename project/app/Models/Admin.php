<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    if (Auth::check() && Auth::user()->isAdmin()) {
        return $next($request);
    }
    return redirect('home');
}
