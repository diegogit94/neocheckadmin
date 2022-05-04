<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistField extends Model
{
    use HasFactory;

    public function checklist_types()
    {
        return $this->belongsToMany(ChecklistType::class);
    }
}
