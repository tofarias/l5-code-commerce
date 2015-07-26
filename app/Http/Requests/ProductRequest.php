<?php

namespace CodeCommerce\Http\Requests;

use CodeCommerce\Http\Requests\Request;

class ProductRequest extends Request
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
    	$this->sanitize();
    	
        return [
            'name' => 'required',
        	'description' => 'required',
        	'price' => 'required|numeric|min:10|max:99',
        	'featured' => 'boolean',
        	'recommend' => 'boolean'
        ];
    }
    
    public function sanitize()
    {
    	$input = $this->all();
    	
    	$input['featured'] = $this->request->get('featured', 0);
    	$input['recommend'] = $this->request->get('recommend', 0);
    	
    	$this->replace($input);
    }
}
