<?php

use Faker\Generator as Faker;

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
        'verified' => $faker->numberBetween(0,1),
        'attachment' => $faker->imageUrl(),
        'isActive' => $faker->numberBetween(0,1),
        'payment_status' => $faker->numberBetween(0,1),
        'remember_token' => str_random(10),
    ];
});

$factory->define('Koboaccountant\Models\Company', function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'name' => $faker->word(6),
        'isActive' => $faker->numberBetween(0,1),
        'logo' => $faker->imageUrl(),
    ];
});

$factory->define('Koboaccountant\Models\Vendor', function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'name' => $faker->name,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'website' => $faker->url,
        'isActive' => $faker->numberBetween(0,1),
        'company_id' => '',
    ];
});


$factory->define(Koboaccountant\Models\Inventory::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'name' => $faker->words(6),
        'sales_price' => $faker->randomFloat(2),
        'purchase_price' => $faker->randomFloat(2),
        'quantity' => $faker->numberBetween(20,49),
        'description' => $faker->sentence(20),
        'delivered_date' => $faker->dateTimeThisYear,
        'attachment' => $faker->url,
        'vendor_id' => ''
    ];
});

$factory->define(Koboaccountant\Models\Staff::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'name' => $faker->words(6),
        'designation' => $faker->word(8),
        'salary' => $faker->randomFloat(3),
        'isActive' => $faker->numberBetween(0,1),
        'employed_date' => $faker->dateTimeThisYear,
        'company_id' => ''
    ];
});

$factory->define(Koboaccountant\Models\SalesChannel::class, function() {
    return [
        'name' => $faker->name,
        'company_id' => ''
    ];
});

$factory->define(Koboaccountant\Models\Sales::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'sales_date' => $faker->DateTime,
        'quantity' => $faker->numberBetween(1,20),
        'amount' => $faker->float,
        'staff_id' => '',
        'company_id' => '',          
        'inventory_id' => ''
    ];
});





// $threads->each(function($thread) {
//     factory('App\Reply', 10)->create(['thread_id' => $thread->id]);
// });