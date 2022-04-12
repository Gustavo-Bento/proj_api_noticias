<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Controllers\AbstractController;
use App\Services\ImageNews\ImageNewsService;
use Exception;
use Illuminate\Http\Client\Request;
use Illuminate\Http\JsonResponse;

abstract class ImageNewsController extends AbstractController
{
    /**
     * @var array
     */
    protected array $searchFields = [];

    /**
     * ImageNewsController constructor.
     * @param ImageNewsService $service
     */
    public function __construct(ImageNewsService $service)
    {
        parent::__construct($service);
    }

    /**
     * @param Request $request
     * @param integer $news
     * @return JsonResponse
     */
    public function findByNews(Request $request, int $news): JsonResponse
    {
        try{
            $result = $this -> service -> findByNews($news);
            $response = $this -> successResponse($result);
        }
        catch(Exception $e){
            $response = $this -> errorResponse($e);
        }

        return response() -> json($response, $response['status_code']);
    }

    /**
     * @param Request $request
     * @param integer $news
     * @return JsonResponse
     */
    public function deleteByNews(Request $request, int $news): JsonResponse
    {
        try{
            $result = $this-> service -> deleteByNews($news);
            $response = $this -> successResponse($result);

        }catch(Exception $e){
            $response = $this -> errorResponse($e);
        }

        return response() -> json($response, $response['status_code']);
    }
}
