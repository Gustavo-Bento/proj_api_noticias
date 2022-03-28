<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\RepositoryInterface;

/**
 * Class AbstractService
 * @package App\Services
 */
abstract class AbstractService implements ServiceInterface
{
    /**
     * @var RepositoryInterface
     */
    protected RepositoryInterface $repository;

    /**
     * AbstractService constructor.
     * @param  RepositoryInterface $repository
     */
    public function __consruct (RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return array
     */
    public function create(array $data): array
    {
        return $this->repository->create($data);
    }

    /**
     * @param integer $limit
     * @param array $orderBy
     * @return array
     */
    public function findAll(int $limit = 10, array $orderBy = []): array
    {
        return $this -> repository->findAll($limit, $orderBy);
    }

    /**
     * @param integer $id
     * @return array
     */
    public function findOneBy(int $id): array
    {
        return $this -> repository -> findOneBy($id);
    }

    /**
     * @param string $param
     * @param array $data
     * @return boolean
     */
    public function editBy(string $param, array $data): bool
    {
        return $this -> repository -> editBy($param, $data);
    }

    /**
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool
    {
        return $this -> repository -> delete($id);
    }

    /**
     * @param string $string
     * @param array $searchFields
     * @param integer $limit
     * @param array $orderBy
     * @return void
     */
    public function searchBy(
    string $string,
    array $searchFields,
    int $limit = 10,
    array $orderBy = [])
    {
        return $this -> repository
        -> searchBy(
            $string,
             $searchFields,
            $limit,
            $orderBy
        );
    }
}
