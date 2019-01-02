<?php

namespace App\Transformers;

use App\News;
use League\Fractal\TransformerAbstract;

class NewsTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(News $news)
    {
        return [
            'title' => $news->title,
            'description' => $news->description
        ];
    }
}
