<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function zone () {
        return $this->belongsTo(Zone::class);
    }

    public function mode () {
        return $this->belongsTo(Mode::class);
    }

    public function category () {
        return $this->belongsTo(Category::class);
    }
}
