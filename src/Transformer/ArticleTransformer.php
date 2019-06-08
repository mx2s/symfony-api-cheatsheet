<?php


namespace App\Transformer;

use App\Entity\Article;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{
    /**
     * @param Article $article
     * @return array
     */
    public function transform(Article $article) {
        return [
            'id' => $article->getId(),
            'title' => $article->getTitle(),
            'content' => $article->getContent()
        ];
    }

    /**
     * @param Article $article
     * @return array
     */
    public static function transformItem(Article $article) {
        $transformer = new self();
        return $transformer->transform($article);
    }
}