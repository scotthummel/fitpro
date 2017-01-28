<?php

namespace App\Lambda\Transformers;

class ResourceCategoryTransformer extends Transformer {

    public function transform($item)
    {
        return [
            'category'    => $item['category'],
            'category_id' => $item['id']
        ];
    }
}