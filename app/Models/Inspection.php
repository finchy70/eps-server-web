<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function batteries()
    {
        return $this->hasMany(Battery::class);
    }

    public function battery_cells()
    {
        return $this->hasMany(BatteryCell::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function transformers()
    {
        return $this->hasMany(Transformer::class);
    }

    public function switchgears()
    {
        return $this->hasMany(Switchgear::class);
    }

    public function tevs()
    {
        return $this->hasMany(Tev::class);
    }

    public function sorted_answers(){
        return $this->hasMany(Answer::class)->orderBy('question_id')->with('question')->get();
    }
}
