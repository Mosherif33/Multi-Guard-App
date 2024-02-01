<?php

namespace Src\Domain\Vendor\Http\Controllers\SAC;

use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use Src\Domain\Vendor\Repositories\Contracts\VendorRepository;
use Illuminate\Http\Request;
use theaddresstech\DDD\Traits\Responder;
use Src\Domain\Vendor\Http\Resources\Vendor\VendorResourceCollection;
use Src\Domain\Vendor\Http\Resources\Vendor\VendorResource;

class LoginController extends Controller
{
    use Responder;

    /**
     * @var VendorRepository
     */
    protected $vendorRepository;

    /**
     * View Path
     *
     * @var string
     */
    protected $viewPath = 'login';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'logins';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected $domainAlias = 'vendors';


    /**
     * @param VendorRepository $vendorRepository
     */
    public function __construct(VendorRepository $vendorRepository)
    {
        $this->vendorRepository = $vendorRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $index = $this->vendorRepository->spatie()->paginate();

        $this->setData('title', __('main.show-all') . ' ' . __('main.login'));

        $this->setData('alias', $this->domainAlias);

        $this->setData('data', $index);

        $this->useCollection(VendorResourceCollection::class,'data');

        return $this->response();
    }
}
