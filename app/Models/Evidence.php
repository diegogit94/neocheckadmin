<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    use HasFactory;

    public function certification()
    {
        return $this->belongsTo(Certification::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function statuses() //Test the relationship with this name
    {
        return $this->hasOne(Status::class);
    }
}
