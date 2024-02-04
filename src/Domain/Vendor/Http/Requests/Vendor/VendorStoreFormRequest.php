<?php

namespace Src\Domain\Vendor\Http\Requests\Vendor;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Src\Infrastructure\Http\AbstractRequests\BaseRequest as FormRequest;

class VendorStoreFormRequest extends FormRequest
{
    /**
     * Determine if the Vendor is authorized to make this request.
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
            'name'        => ['required', 'string', 'max:255',Rule::unique('vendors','name')->whereNull('deleted_at')],
            'description' => ['required','string'],
            'email'       => ['required','email',Rule::unique('vendors','email')->whereNull('deleted_at')],
            'password'    => ['required','confirmed','min:8'],
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
        return [
            'name'         =>  __('main.name'),
            'description'  =>  __('main.description'),
        ];
    }

    public function validated($key = null,$default = null)
    {
        $validatedAttributes = parent::validated();
        if (array_key_exists('password', $validatedAttributes)) {
            $validatedAttributes['password'] = Hash::make($validatedAttributes['password']);
        }
        return $validatedAttributes;
    }
}
