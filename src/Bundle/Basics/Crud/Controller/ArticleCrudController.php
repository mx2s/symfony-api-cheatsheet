<?php


namespace App\Bundle\Basics\Crud\Controller;

use App\Bundle\Basics\Crud\Request\CreateArticleRequest;
use App\Entity\Article;
use App\Entity\Person;
use App\Transformer\ArticleTransformer;
use App\Transformer\ValidationErrorsTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ArticleCrudController
 * @package App\Bundle\Basics\Crud\Controller
 */
class ArticleCrudController extends AbstractController
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $validatedRequest = new CreateArticleRequest($request);

        $errors = $validatedRequest->validate();

        if (count($errors) > 0) {
            return new JsonResponse([
                'errors' => ValidationErrorsTransformer::transform($errors)
            ], 422);
        }

        $person = $entityManager->getRepository(Person::class)->find($validatedRequest->personId ?? 0);

        if (!$person) {
            return new JsonResponse([
                "errors" => [
                    "message" => "Person not exist"
                ]
            ], 404);
        }

        $article = new Article();
        $article->setTitle($validatedRequest->title);
        $article->setContent($validatedRequest->content);
        $article->setPerson($person);

        $entityManager->persist($article);
        $entityManager->flush();

        return new JsonResponse([
            'data' => [
                'article' => ArticleTransformer::transformItem($article)
            ]
        ], 201);
    }

    /**
     * @param int $id
     * @return object|JsonResponse
     */
    public function get($id) {
        $entityManager = $this->getDoctrine()->getManager();

        $article = $entityManager->getRepository(Article::class)->find($id);

        if (!$article) {
            return new JsonResponse([
                "errors" => [
                    "message" => "Article not found"
                ]
            ], 404);
        }

        return new JsonResponse([
            'data' => [
                'article' => ArticleTransformer::transformItem($article)
            ]
        ]);
    }

    // TODO: implement UPDATE

    // TODO: implement DELETE
}