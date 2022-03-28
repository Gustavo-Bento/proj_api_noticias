<?php

declare(strict_types=1);

namespace App\Services\ImageNews;

use App\Services\AbstractService;

class ImageNewsService extends AbstractService
{
    /**
     * @param integer $newsId
     * @return array
     */
    public function findByNews(int $newsId): array
    {
        return $this -> repository->findByNews($newsId);
    }

    /**
     * @param integer $newsId
     * @return boolean
     */
    public function deleteByNews(int $newsId): bool
    {
        return $this -> repository -> deleteByNews($newsId);
    }
}
