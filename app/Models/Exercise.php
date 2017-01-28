<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['body_part_id', 'category_id', 'exercise_name', 'active'];

    public function partOfBody()
    {
        return $this->belongsTo(BodyPart::class, 'body_part_id');
    }

    public function category() {
        return $this->belongsTo(ExerciseCategory::class);
    }
}
