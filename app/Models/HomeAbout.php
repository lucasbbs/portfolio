<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeAbout extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_of_birth',
        'profession',
        'phone',
        'email',
        'website',
        'city',
        'country',
        'freelance',
        'degree',
    ];
}
