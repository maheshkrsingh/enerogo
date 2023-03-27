<?php

namespace Modules\Products\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>[
                'required',
                'string',
              
            ],
            'slug'=>[
                'required',
                'string',
              
            ],
            'small_description'=>[
                'string',
               
            ],
            'description'=>[
                'required',
                'string',
                
            ],
            'original_price'=>[
                'required',
                'integer',
               
            ],
            'selling_price'=>[
                'required',
                'integer',
               
            ],
            'quantity'=>[
                'required',
                'integer',
            
            ],
            'meta_title'=>[
                'required',
                'string',
              
            ],
            'meta_description'=>[
                'required',
                'string',
                
            ],
            'meta_keyword'=>[
                'required',
                'string',
               
            ],
            'image'=>[
                'nullable',
              //  'mimes:png,jpg,jpeg,webp'
              
            ],
          
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
