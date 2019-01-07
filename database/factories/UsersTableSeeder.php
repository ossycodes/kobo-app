<?php

use Faker\Generator as Faker;
use Koboaccountant\Models\Inventory;
use Koboaccountant\Models\SaleChannel;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define('Koboaccountant\Models\User', function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'verified' => $faker->numberBetween(0, 1),
        'attachment' => $faker->imageUrl(),
        'isActive' => $faker->numberBetween(0, 1),
        'remember_token' => str_random(10),
    ];
});

$suffixes = [' LLC.', ' LTD.', ' GmBH.'];

$factory->define('Koboaccountant\Models\Company', function (Faker $faker) use($suffixes) {
	shuffle($suffixes);
    return [
        'id' => $faker->uuid,
        'name' => $name = ucfirst($faker->sentence(2)) . $suffixes[0],
        'slug' => str_slug($name),
	    'ID_number' => preg_match_all('/\b(\w)/', strtoupper($name),$m) ? implode('', $m[1]) . '-' . $faker->randomNumber(5) : 'UV', // $v is now SOQTU
        'isActive' => 1,
        'logo' => $faker->imageUrl(),
    ];
});

$factory->define('Koboaccountant\Models\Vendor', function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'company_id' => '',
        'name' => $faker->name,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'website' => $faker->url,
        'isActive' => $faker->numberBetween(0, 1),
    ];
});

$factory->define(Inventory::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'user_id' => '',
        'vendor_id' => '',
        'name' => ucfirst($faker->sentence(2)),
        'sales_price' => $faker->randomFloat(2),
        'purchase_price' => $faker->randomFloat(2),
        'quantity' => $faker->numberBetween(20, 49),
        'description' => $faker->word(20),
        'delivered_date' => $faker->dateTime(),
        'attachment' => $faker->word(6),
    ];
});

$roles = ['CEO', 'Product Manager', 'Public Servant', 'Marketer', 'Member', 'Developer'];
$factory->define(\Koboaccountant\Models\Staff::class, function (Faker $faker) use($roles) {
	shuffle($roles);
    return [
        'id'            => $faker->uuid,
        'name'          => $faker->name,
        'user_id'       => '',
        'company_id'    => '',
        'designation'   => $roles[0],
        'salary'        => $faker->numberBetween(30000, 150000),
        'isActive'      => $faker->numberBetween(0, 1),
        'employed_date' => $faker->dateTime(),
        'avatar'        => $faker->imageUrl,
    ];
});

$factory->define(SaleChannel::class, function (Faker $faker) {
    return [
    	'id' => $faker->uuid,
        'name' => $faker->colorName,
    ];
});

$factory->define(Koboaccountant\Models\Customer::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'website' => $faker->url,
        'image' => $faker->imageUrl,
        'isActive' => $faker->numberBetween(0, 1),
    ];
});
