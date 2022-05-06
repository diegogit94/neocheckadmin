<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistType extends Model
{
    use HasFactory;

    public function certifications()
    {
        return $this->hasMany(Certification::class);
    }

    public function checklist_fields()
    {
        return $this->belongsToMany(ChecklistField::class);
    }
}
