<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devolution extends Model
{
    use HasFactory;

    // Renamed default timestamps
    const CREATED_AT = 'devolution_date';
    const UPDATED_AT = 'reactivation_date';

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
