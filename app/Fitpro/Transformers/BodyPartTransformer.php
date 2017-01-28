<?php

namespace App\FitPro\Transformers;

class BodyPartTransformer extends Transformer {

    public function transform($item)
    {
        return [
            'id'        => $item['id'],
            'body_part' => $item['body_part']
        ];
    }
}