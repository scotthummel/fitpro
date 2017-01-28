<?php

namespace App\Lambda\Transformers;

class FellowshipTransformer extends Transformer {

    public function transform($item)
    {
        $meeting = (array_key_exists('meeting', $item)) ? $item['meeting'] : NULL;

        $fellowship = [];

        if (!empty($meeting)) {
            $fellowship['meeting_name'] = $meeting;
            $fellowship['description']  = $item['description'];
            $fellowship['meeting_day']  = $item['day'];
            $fellowship['meeting_time'] = date('g:i a', strtotime($item['meeting_time']));
        } else {
            $fellowship = [
                'fellowship_name' => $item['fellowship'],
                'description'     => $item['fellowship_description'],
                'slug'            => $item['slug'],
                'abbreviation'    => $item['abbreviation'],
                'fellowship_id'   => $item['id']
            ];
        }

        return $fellowship;
    }
}