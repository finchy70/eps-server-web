<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    public function inspection(){
        return $this->belongsTo(Inspection::class);
    }

    public function answer(){
        return $this->belongsTo(Answer::class);

    }
}
