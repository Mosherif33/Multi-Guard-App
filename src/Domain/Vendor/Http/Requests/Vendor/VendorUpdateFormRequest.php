<?php

namespace Src\Domain\Vendor\Http\Requests\Vendor;
use Illuminate\Validation\Rule;
use Src\Infrastructure\Http\AbstractRequests\BaseRequest as FormRequest;


class VendorUpdateFormRequest extends FormRequest
{
    /**
     * Determine if the vendor is authorized to make this request.
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
            'name'        => ['sometimes', 'string', 'max:255',Rule::unique('vendors','name')->whereNull('deleted_at')->ignore($this->vendor)],
            'email'       => ['sometimes','email',Rule::unique('vendors','email')->whereNull('deleted_at')->ignore($this->vendor)],
            'password'    => ['nullable', 'confirmed', 'min:8'],
            'description' => ['sometimes', 'string', 'max:255'],
        ];
        return $rules;
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
