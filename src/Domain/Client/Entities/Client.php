<?php

namespace Src\Domain\Client\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Src\Infrastructure\AbstractModels\BaseModel as Model;
use Src\Domain\Client\Entities\Traits\Relations\ClientRelations;
use Src\Domain\Client\Entities\Traits\CustomAttributes\ClientAttributes;
use Src\Domain\Client\Repositories\Contracts\ClientRepository;

class Client extends Model
{
    use ClientRelations, ClientAttributes, SoftDeletes, HasFactory;

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
        'password'
    ];

    /**
     * The table name.
     *
     * @var array
     */
    protected $table = "clients";

    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    protected $routeRepoBinding = ClientRepository::class;
}
