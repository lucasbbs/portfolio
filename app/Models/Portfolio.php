<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date',
        'client',
        'url',
        'title',
        'description',
    ];
    public function tag()
    {
        return $this->hasOne(Tags::class, 'id', 'tag_id');
    }
}