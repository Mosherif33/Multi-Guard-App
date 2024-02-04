<?php

namespace Src\Domain\Vendor\Http\Controllers\SAC;

use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use Src\Domain\Vendor\Repositories\Contracts\VendorRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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
        try {
            if (!auth('vendor')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return response()->json(['message' => 'email or password incorrect!',], 401);
            }
            $vendor = \auth('vendor')->user();

            $this->setData('data', $vendor);

            $this->useCollection(VendorResource::class, 'data');
            if ($request->wantsJson()) {
                $this->setData('meta', [
                    'token' => $vendor->createToken('vendor token', ['vendor'])->accessToken,
                ]);
            }
        } catch (\Exception $exception) {
            $this->setApiResponse(fn () => response(['message' => $exception->getMessage()], Response::HTTP_CONFLICT));
        }
        return $this->response();
    }
}
