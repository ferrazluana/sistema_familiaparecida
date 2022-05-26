<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Status::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Ministerio::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'description' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Curso::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Membro::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'birth_date' => $faker->date(),
        'phone' => $faker->sentence,
        'address' => $faker->sentence,
        'marital_status' => $faker->sentence,
        'personality' => $faker->sentence,
        'description' => $faker->text(),
        'isBaptized' => $faker->boolean(),
        'isLeader' => $faker->boolean(),
        'isPastor' => $faker->boolean(),
        'status_id' => $faker->sentence,
        'spouse_name' => $faker->sentence,
        'wedding_date' => $faker->date(),
        'baptized_date' => $faker->date(),
        'discipler' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
