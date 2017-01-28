<?php

namespace App\Lambda\Transformers;

class MeetingTransformer extends Transformer {

    public function transform($item)
    {
        return [
            'meeting_name' => $item['meeting'],
            'description'  => $item['description'],
            'day'          => date('M', $item['day_index'])
        ];
    }
}