<?php

namespace Src\Domain\Locations\Repositories\Eloquent;

use Src\Domain\Locations\Repositories\Contracts\LocationRepository;
use Src\Domain\Locations\Entities\Location;
use Src\Infrastructure\AbstractRepositories\EloquentRepository;

/**
 * Class LocationRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class LocationRepositoryEloquent extends EloquentRepository implements LocationRepository
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
        return Location::class;
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
