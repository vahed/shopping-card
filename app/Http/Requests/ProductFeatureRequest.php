<?php

namespace App\Http\Requests;

use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductFeatureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'productName' => 'required',
            'productPrice' => 'required|int',
            'productColor' => 'required',
            'productQuantity' => 'required',
            'productDiscount' => 'required',
            'productDescription' => 'required',
            'productSize' => 'required',
            'productInstock' => 'required|boolean',
        ];
    }
}
