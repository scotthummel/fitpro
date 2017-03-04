<?php

namespace App\Fitpro\Transformers;

class ExerciseCategoryTransformer extends Transformer {

    public function transform($item)
    {
        return [
            'id'              => $item['id'],
            'category_name'   => $item['category_name']
        ];
    }
}