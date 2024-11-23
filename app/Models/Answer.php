<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public function inspection()
    {
        return $this->belongsTo(Inspection::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
}
