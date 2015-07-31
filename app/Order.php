<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = ['user_id', 'total'];
	
    public function items()
    {
    	return $this->hasMany(OrderItem::class);
    }
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
