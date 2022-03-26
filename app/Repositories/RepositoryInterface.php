<?php

declare(strict_types=1);

namespace App\Repositories;

use phpDocumentor\Reflection\Types\Boolean;

/**
 * interface RepositoryInterface
 * @package App\Repositories
 */
interface RepositoryInterface
{
    /**
     * @param array $data
     * @return array
     */
    public function create(array $data):array;

    /**
     * @param integer $limit
     * @param array $orderBy
     * @return array
     */
    public function findAll(int $limit = 10, array $orderBy = []):array;

    /**
     * @param integer $id
     * @return array
     */
    public function findOneBy(int $id):array;

    /**
     * @param string $param
     * @param array $data
     * @return boolean
     */
    public function editBy(string $param, array $data): bool;

    /**
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id):bool;

    /**
     * @param string $string
     * @param array $searchFields
     * @param integer $limit
     * @param array $orderBy
     * @return array
     */
    public function searchBy(
        string $string,
        array $searchFields,
        int $limit=10,
        array $orderBy=[]
    ):array;
}
