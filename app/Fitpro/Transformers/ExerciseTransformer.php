<?php

namespace App\FitPro\Transformers;

class ExerciseTransformer extends Transformer {

    public function transform($item)
    {
        return [
            'id'              => $item['id'],
            'exercise_name'   => $item['exercise_name']
        ];
    }
}