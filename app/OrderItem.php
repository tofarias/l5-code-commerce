<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    
    protected $fillable = ['price', 'qtd', 'product_id'];
    
    public function order()
    {
    	return $this->belongsTo(Order::class);
    }
}
