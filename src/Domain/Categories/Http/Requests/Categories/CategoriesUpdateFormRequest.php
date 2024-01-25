<?php

namespace Src\Domain\Categories\Http\Requests\Categories;
use Src\Domain\Categories\Http\Requests\Categories\CategoriesStoreFormRequest;

class CategoriesUpdateFormRequest extends CategoriesStoreFormRequest
{
    /**
     * Determine if the categories is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
        // 'email'    => ['required','unique:categories,name,'.$this->route()->parameter('categories').',id'],
        ];

        return array_merge(parent::rules(), $rules);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return parent::attributes();
    }
}
