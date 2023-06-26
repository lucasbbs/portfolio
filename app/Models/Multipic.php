<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multipic extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
    ];

    public function tag() {
        return $this->hasOne(Tags::class, 'id', 'tag_id');
    }
}
