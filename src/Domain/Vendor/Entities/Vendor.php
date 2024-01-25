<?php

namespace Src\Domain\Vendor\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Src\Infrastructure\AbstractModels\BaseModel as Model;
use Src\Domain\Vendor\Entities\Traits\Relations\VendorRelations;
use Src\Domain\Vendor\Entities\Traits\CustomAttributes\VendorAttributes;
use Src\Domain\Vendor\Repositories\Contracts\VendorRepository;

class Vendor extends Model
{
    use VendorRelations, VendorAttributes, SoftDeletes;

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
        'email',
        'password',
        'location_id'
    ];

    /**
     * The table name.
     *
     * @var array
     */
    protected $table = "vendors";

    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    protected $routeRepoBinding = VendorRepository::class;
}
