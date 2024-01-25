<?php

namespace Src\Domain\Products\Entities;

use Src\Infrastructure\AbstractModels\BaseModel as Model;
use Src\Domain\Products\Entities\Traits\Relations\ProductRelations;
use Src\Domain\Products\Entities\Traits\CustomAttributes\ProductAttributes;
use Src\Domain\Products\Repositories\Contracts\ProductRepository;

class Product extends Model
{
    use ProductRelations, ProductAttributes;

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
    protected $table = "products";

    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    protected $routeRepoBinding = ProductRepository::class;
}
