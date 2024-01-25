<?php

namespace Src\Domain\Categories\Http\Controllers;

use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use Src\Domain\Categories\Http\Requests\Categories\CategoriesStoreFormRequest;
use Src\Domain\Categories\Http\Requests\Categories\CategoriesUpdateFormRequest;
use Src\Domain\Categories\Repositories\Contracts\CategoriesRepository;
use Illuminate\Http\Request;
use theaddresstech\DDD\Traits\Responder;
use Src\Domain\Categories\Entities\Categories;
use Src\Domain\Categories\Http\Resources\Categories\CategoriesResourceCollection;
use Src\Domain\Categories\Http\Resources\Categories\CategoriesResource;

class CategoriesController extends Controller
{
    use Responder;

    /**
     * @var CategoriesRepository
     */
    protected $categoriesRepository;

    /**
     * View Path
     *
     * @var string
     */
    protected $viewPath = 'categories';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'categories';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected $domainAlias = 'categories';


    /**
     * @param CategoriesRepository $categoriesRepository
     */
    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $index = $this->categoriesRepository->spatie()->paginate();

        $this->setData('title', __('main.show-all') . ' ' . __('main.categories'));

        $this->setData('alias', $this->domainAlias);

        $this->setData('data', $index);

        $this->useCollection(CategoriesResourceCollection::class,'data');

        return $this->response();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setData('title', __('main.add') . ' ' . __('main.categories'), 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setApiResponse(fn()=> response()->json(['create_your_own_form'=>true]));

        return $this->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesStoreFormRequest $request)
    {
        $store = $this->categoriesRepository->create($request->validated());

        if($store){
            $this->setData('data', $store);

            $this->redirectRoute("{$this->resourceRoute}.show",[$store->id]);
            $this->useCollection(CategoriesResource::class, 'data');
        }else{
            $this->redirectBack();
            $this->setApiResponse(fn()=> response()->json(['created'=>false]));
        }

        return $this->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($categories)
    {
        $categories=$this->categoriesRepository->spatie()->find($categories);

        $this->setData('title', __('main.show') . ' ' . __('main.categories') . ' : ' . $categories->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setData('show', $categories);

        $this->useCollection(CategoriesResource::class,'show');

        return $this->response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories)
    {
        $this->setData('title', __('main.edit') . ' ' . __('main.categories') . ' : ' . $categories->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setData('edit', $categories);

        $this->useCollection(CategoriesResource::class,'edit');

        return $this->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesUpdateFormRequest $request, $categories)
    {
        $update = $this->categoriesRepository->update($request->validated(), $categories);

        if($update){
            $this->redirectRoute("{$this->resourceRoute}.show",[$update->id]);
            $this->setData('data', $update);
            $this->useCollection(CategoriesResource::class, 'data');
        }else{
            $this->redirectBack();
            $this->setApiResponse(fn()=>response()->json(['updated'=>false],422));
        }

        return $this->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ids = request()->get('ids',[$id]);

        $delete = $this->categoriesRepository->destroy($ids);

        if($delete){
            $this->redirectRoute("{$this->resourceRoute}.index");
            $this->setApiResponse(fn()=>response()->json(['deleted'=>true],200));
        }else{
            $this->redirectBack();
            $this->setApiResponse(fn()=>response()->json(['updated'=>false],422));
        }

        return $this->response();
    }

}
