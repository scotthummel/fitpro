<?php

namespace App\Lambda\Transformers;

class ResourceTransformer extends Transformer {

    public function transform($item)
    {
        return [
            'resource'     => $item['resource'],
            'resource_url' => $item['url'],
            'phone_number' => $item['phone_number']
        ];
    }
}