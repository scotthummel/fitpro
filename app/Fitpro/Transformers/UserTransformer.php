<?php

namespace App\Fitpro\Transformers;

class UserTransformer extends Transformer {

    public function transform($item)
    {
        return [
            'id'         => $item['id'],
            'first_name' => $item['first_name'],
            'last_name'  => $item['last_name'],
            'email'      => $item['email']
        ];
    }
}