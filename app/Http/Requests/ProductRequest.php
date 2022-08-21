<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
        if ((count($this->route()->parameters()) == 0) && ($this->method('POST'))) {
            # code...
            return ["product_name" => 'required',
                    "price" => 'required|numeric|gt:0',
                    "product_description" => 'required',
                    "file.*" => 'required|mimes:jpg,jpeg,png,bmp,tiff',
                ];
        } else {
            # code...
            return ["product_name" => 'required',
                    "price" => 'required|numeric|gt:0',
                    "product_description" => 'required',
                    "file.*" => 'required|mimes:jpg,jpeg,png,bmp,tiff',
                ];
        }
    }

    public function messages()
    {
        if ((count($this->route()->parameters()) == 0) && ($this->method('POST'))) {
            # code...
            return ["product_name.required" => 'Product name field is required',
                    "price.required" => 'Price field is required',
                    "product_description.required" => 'Product description field is required',
                    "file.*.required" => 'File is required',
                    "file.*.mimes" => 'Only image file allowed',
                ];
        } else {
            # code...
            return ["product_name.required" => 'Product name field is required',
                    "price.required" => 'Price field is required',
                    "product_description.required" => 'Product description field is required',
                    "file.*.required" => 'File is required',
                    "file.*.mimes" => 'Only image file allowed',
                ];
        }
    }
}
