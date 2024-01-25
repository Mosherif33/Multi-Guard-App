<?php

namespace Src\Domain\Categories\Repositories\Eloquent;

use Src\Domain\Categories\Repositories\Contracts\CategoriesRepository;
use Src\Domain\Categories\Entities\Categories;
use Src\Infrastructure\AbstractRepositories\EloquentRepository;

/**
 * Class CategoriesRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CategoriesRepositoryEloquent extends EloquentRepository implements CategoriesRepository
{

    /**
     * Specify Fields
     *
     * @return string
     */
    protected $allowedFields = [
        ###allowedFields###
    	###\allowedFields###
    ];

    /**
     * Include Relationships
     *
     * @return string
     */
    protected $allowedIncludes = [
        ###allowedIncludes###
    	###\allowedIncludes###
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Categories::class;
    }

    /**
     * Specify Model Relationships
     *
     * @return string
     */
    public function relations()
    {
        return [
            ###allowedRelations###
            ###\allowedRelations###
        ];
    }
}
