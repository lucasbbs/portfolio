<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'icon_id'];

        public function icon() {
            return $this->hasOne(Icon::class, 'id', 'icon_id');
        }
}
