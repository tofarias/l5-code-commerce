<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
#use Illuminate\Database\Eloquent\Factory;
use CodeCommerce\User;
use CodeCommerce\Product;
use CodeCommerce\Category;

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
	
		factory(User::class, 1)->create();
		
		factory(Category::class, 20)->create();
		
		factory(Product::class, 100)->create();
		
		Model::reguard();
	}

}
