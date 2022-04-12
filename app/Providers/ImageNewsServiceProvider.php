<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\ImageNews\ImageNews;
use App\Repositories\ImageNews\ImageNewsRepository;
use App\Services\ImageNews\Service;
use Illuminate\Support\ServiceProvider;

class ImageNewsServiceProvider extends ServiceProvider
{
    public  function register()
    {
        $this -> app -> bind(ImageNewsService::class, function ($app) {
            retunr new ImageNewsService(new ImageNewsRepository(new ImageNews()));
        });
    }
}
