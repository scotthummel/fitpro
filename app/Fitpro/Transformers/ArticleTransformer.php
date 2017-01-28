<?php

namespace App\Lambda\Transformers;

class ArticleTransformer extends Transformer {

    public function transform($item)
    {
        return [
            'headline'   => $item['title'],
            'story'      => $item['story'],
            'flyer'      => $item['flyer'],
            'screenshot' => $item['screenshot']
        ];
    }
}