<?php

namespace Src\Domain\Vendor\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Src\Infrastructure\AbstractModels\BaseModel as Model;
use Src\Domain\Vendor\Entities\Traits\Relations\VendorRelations;
use Src\Domain\Vendor\Entities\Traits\CustomAttributes\VendorAttributes;
use Src\Domain\Vendor\Repositories\Contracts\VendorRepository;

class Vendor extends Authenticatable
{
    use VendorRelations, VendorAttributes, SoftDeletes, HasApiTokens;

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
        'description'
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
