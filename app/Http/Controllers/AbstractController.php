<?php

namespace App\Http\Controllers;


use App\Services\ServiceInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Class AbstractController
 * @package App\Http\Controllers
 */
abstract class AbstractController extends BaseController implements ControllerInterface
{
    /**
     * @var ServiceInterface
     */
    protected ServiceInterface $service;

    /**
     * @var array
     */
    protected array $searchFields = [];

    /**
     * @param ServiceInterface $service
     */
    public function __construct (ServiceInterface $service)
    {
        $this -> service = $service;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        try {
            $result = $this->service->create($request->all());
            $response = $this->successResponse($result, Response::HTTP_CREATED);
        } catch (Exception $e) {
            $response = $this->errorResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function findAll(Request $request): JsonResponse
    {
        try{
            $limit = (int) $request -> get('limit', 10);
            $orderBy = $request -> get('order_by',[]);
            $searchString = $request-> get('q', '');
            if(!empty($searchString)){
                $result = $this -> service -> searchBy(
                    $searchString,
                    $this -> searchFields,
                    $limit,
                    $orderBy
                );
            }else{
                $result = $this -> service -> findAll($limit, $orderBy);
            }
            $response = $this -> successResponse($result, Response::HTTP_PARTIAL_CONTENT);
        }catch(Exception $e){
            $response = $this -> erroResponse($e);
        }

        return response() -> json($response, $response['status_code']);
    }

    /**
     * @param ClientRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function findOneBy(ClientRequest $request, int $id): JsonResponse
    {
        try{
            $result = $this -> service -> findOneBy($id);
            $response = $this -> successResponse($result);
        }catch(Exception $e){
            $response = $this -> erroResponse($e);
        }

        return response()->json($response, $response['status_code']);
    }

    /**
     * @param Request $request
     * @param string $param
     * @return void
     */
    public function editBy(Request $request, string $param)
    {
        try{
            $result['registro_alterado'] = $this -> service -> editBy($param, $request->all());
            $response = $this ->successResponse($result);
        }catch(Exception $e){
            $response = $this-> erroResponse($e);
        }
        return response() -> json ($response, $response['status_code']);
    }

    /**
     * @param Request $request
     * @param integer $id
     * @return JsonResponse
     */
    public function delete(Request $request, int $id): JsonResponse
    {
        try{
            $result['registro_deletado'] = $this -> service -> delete($id);
            $response = $this -> successResponse($result);
        }catch(Exception $e){
            $response = $this -> erroResponse($e);
        }

        return response() -> json($response, $response['status_code']);
    }

    /**
     * @param array $data
     * @param [type] $statusCode
     * @return array
     */
    protected function successResponse(array $data, int $statusCode = Response::HTTP_OK): array
    {
        return [
            'status_code' => $statusCode,
            'data' => $data
        ];
    }

    /**
     * @param Exception $e
     * @param [type] $statusCode
     * @return array
     */
    protected function erroResponse(Exception $e, int $statusCode = Response::HTTP_BAD_REQUEST): array
    {
        return [
            'status_code' => $statusCode,
            'error' => true,
            'error_description' => $e->getMessage()
        ];
    }

}
