<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fact extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'number'
    ];
    
    public function icon() {
        return $this->hasOne(Icon::class, 'id', 'icon_id');
    }
}