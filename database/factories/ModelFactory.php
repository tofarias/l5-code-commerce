<?php

use CodeCommerce\User;
use CodeCommerce\Product;
use CodeCommerce\Category;

$factory->define(User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,    	
        'password' => Hash::make('123456'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Category::class, function($faker){
	
	return[
		'name' => $faker->name,
		'description' => $faker->sentence
	];
	
});

	$factory->define(Product::class, function($faker){
	
		return[
				'category_id' => $faker->numberBetween(1, 4),
				'name' => $faker->name,
				'description' => $faker->sentence,
				'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 99),
				'featured' => $faker->boolean(),
				'recommend' => $faker->boolean()
		];
	
	});