<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'order'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public static function remove_empty($inspection, $sections){
        $section_list = [];
        foreach($inspection->answers as $answer){
            foreach($sections as $section){
                if($answer->question->section->id === $section->id){
                    if(!in_array($section->id, $section_list)){
                        $section_list[] = $section->id;
                    }
                }
            }
        }
        return $section_list;

    }
}
