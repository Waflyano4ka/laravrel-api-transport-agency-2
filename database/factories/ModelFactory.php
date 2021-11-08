<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }
}
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'activated' => true,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'email' => $faker->email,
        'first_name' => $faker->firstName,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'last_login_at' => $faker->dateTime,
        'last_name' => $faker->lastName,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'updated_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, static function (Faker\Generator $faker) {
    return [
        'api_token' => $faker->sentence,
        'birthday' => $faker->date(),
        'created_at' => $faker->dateTime,
        'deleted' => $faker->boolean(),
        'dismissed' => $faker->boolean(),
        'email' => $faker->email,
        'first_name' => $faker->firstName,
        'inn' => $faker->sentence,
        'passport_number' => $faker->sentence,
        'passport_series' => $faker->sentence,
        'password' => bcrypt($faker->password),
        'scan' => $faker->sentence,
        'second_name' => $faker->sentence,
        'surname' => $faker->lastName,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Post::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'deleted' => $faker->boolean(),
        'post_name' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\City::class, static function (Faker\Generator $faker) {
    return [
        'city_name' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'deleted' => $faker->boolean(),
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Office::class, static function (Faker\Generator $faker) {
    return [
        'address' => $faker->sentence,
        'city_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'deleted' => $faker->boolean(),
        'phone' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Route::class, static function (Faker\Generator $faker) {
    return [
        'arrival_city_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'deleted' => $faker->boolean(),
        'departure_city_id' => $faker->sentence,
        'distance' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'user_id' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Model::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'deleted' => $faker->boolean(),
        'model_name' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Transport::class, static function (Faker\Generator $faker) {
    return [
        'car_number' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'deleted' => $faker->boolean(),
        'model_id' => $faker->sentence,
        'total_seats' => $faker->boolean(),
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Schedule::class, static function (Faker\Generator $faker) {
    return [
        'confirmed' => $faker->boolean(),
        'cost' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'date' => $faker->date(),
        'deleted' => $faker->boolean(),
        'route_id' => $faker->sentence,
        'time' => $faker->time(),
        'transport_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Passenger::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'deleted' => $faker->boolean(),
        'first_name' => $faker->firstName,
        'passport_number' => $faker->sentence,
        'passport_series' => $faker->sentence,
        'phone' => $faker->sentence,
        'second_name' => $faker->sentence,
        'surname' => $faker->lastName,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Ticket::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'deleted' => $faker->boolean(),
        'passenger_id' => $faker->sentence,
        'schedule_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PostUser::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'deleted' => $faker->boolean(),
        'post_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'user_id' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\OfficeUser::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'deleted' => $faker->boolean(),
        'office_id' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        'user_id' => $faker->sentence,
        
        
    ];
});
