<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Muscle extends Model
{
    protected $fillable = ['body_part_id', 'muscle_name', 'active'];

    public function partOfBody() {
        return $this->belongsTo(BodyPart::class, 'body_part_id');
    }
}
