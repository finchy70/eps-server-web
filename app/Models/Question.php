<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'section_id', 'order'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

}
