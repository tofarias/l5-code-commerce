<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';
	protected $fillable = [
							'category_id',
							'name',
							'description',
							'price',
							'featured',
							'recommend'
						];
	
	
	public function scopeFeatured( $query )
	{
		return $query->where('featured', 1);
	}
	
	public function scopeRecommended( $query )
	{
		return $query->where('recommend', 1);
	}
	
	public function scopeOfCategory($query, $type)
	{
		return $query->where('category_id', $type);
	}
	
	public function images()
	{
		return $this->hasMany(ProductImage::class);
	}
	
	public function category()
	{
		return $this->belongsTo(Category::class);
	}
	
	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}

}
