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
