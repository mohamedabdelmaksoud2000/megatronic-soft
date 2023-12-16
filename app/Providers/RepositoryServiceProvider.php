<?php

namespace App\Providers;

use App\Interfaces\Repositories\ProjectInterface;
use App\Interfaces\Repositories\ServiceInterface;
use App\Interfaces\Repositories\TechInterface;
use App\Repositories\ServiceRepository;
use App\Repositories\TechRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->app->bind(ServiceInterface::class,ServiceRepository::class);
        $this->app->bind(TechInterface::class,TechRepository::class);
        $this->app->bind(ProjectInterface::class,ProjectInterface::class);
    }

}
