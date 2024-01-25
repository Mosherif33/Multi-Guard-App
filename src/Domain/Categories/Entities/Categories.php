<?php

namespace Src\Domain\Categories\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Src\Infrastructure\AbstractModels\BaseModel as Model;
use Src\Domain\Categories\Entities\Traits\Relations\CategoriesRelations;
use Src\Domain\Categories\Entities\Traits\CustomAttributes\CategoriesAttributes;
use Src\Domain\Categories\Repositories\Contracts\CategoriesRepository;

class Categories extends Model
{
    use CategoriesRelations, CategoriesAttributes, HasFactory, SoftDeletes;

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
        'name',
        'type',
        'number'
    ];

    /**
     * The table name.
     *
     * @var array
     */
    protected $table = "categories";

    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    protected $routeRepoBinding = CategoriesRepository::class;
}
