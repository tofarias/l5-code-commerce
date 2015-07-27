<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    
	public function products()
	{
		return $this->belongsToMany(Product::class);
	}
}
