<?php

namespace Src\Domain\Vendor\Entities;

use Src\Infrastructure\AbstractModels\BaseModel as Model;
use Src\Domain\Vendor\Entities\Traits\Relations\VendorLocationRelations;
use Src\Domain\Vendor\Entities\Traits\CustomAttributes\VendorLocationAttributes;
use Src\Domain\Vendor\Repositories\Contracts\VendorLocationRepository;

class VendorLocation extends Model
{
    use VendorLocationRelations, VendorLocationAttributes;

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
    protected $table = "vendor_locations";

    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    protected $routeRepoBinding = VendorLocationRepository::class;
}
