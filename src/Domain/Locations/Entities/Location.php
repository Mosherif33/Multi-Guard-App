<?php

namespace Src\Domain\Locations\Entities;

use Src\Infrastructure\AbstractModels\BaseModel as Model;
use Src\Domain\Locations\Entities\Traits\Relations\LocationRelations;
use Src\Domain\Locations\Entities\Traits\CustomAttributes\LocationAttributes;
use Src\Domain\Locations\Repositories\Contracts\LocationRepository;

class Location extends Model
{
    use LocationRelations, LocationAttributes;

    /**
     * define belongsTo relations.
     *
     * @var array
     */
    private $belongsTo = [];

    /**
     * define hasMany relations.
     *
     * @var array
     */
    private $hasMany = [];

    /**
     * define belongsToMany relations.
     *
     * @var array
     */
    private $belongsToMany = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The table name.
     *
     * @var array
     */
    protected $table = "locations";

    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    protected $routeRepoBinding = LocationRepository::class;
}
