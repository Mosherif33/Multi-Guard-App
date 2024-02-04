<?php

namespace Src\Domain\Vendor\Entities;

use Src\Infrastructure\AbstractModels\BaseModel as Model;
use Src\Domain\Vendor\Entities\Traits\Relations\VendorCategoryRelations;
use Src\Domain\Vendor\Entities\Traits\CustomAttributes\VendorCategoryAttributes;
use Src\Domain\Vendor\Repositories\Contracts\VendorCategoryRepository;

class VendorCategory extends Model
{
    use VendorCategoryRelations, VendorCategoryAttributes;

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
    protected $table = "vendor_categories";

    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    // protected $routeRepoBinding = VendorCategoryRepository::class;
}
