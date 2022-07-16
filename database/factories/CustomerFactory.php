<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_customer' => $this->faker->name(),
            'img_customer' => null,
            'email_customer' => $this->faker->unique()->safeEmail(),
            'phone_customer' => $this->faker->numerify('09##########'),
            'password_customer' => '$2y$10$awxR0xfZ66ymy/1E0nSGHuGo5.L9IiNu9nrb1JkMox6Uj0lTKi75a', // password : 123456
            'address_customer' => $this->faker->address(),
            'birthday_customer' => Carbon::instance($this->faker->dateTimeThisMonth()),
            'status_customer' => 1,
            'remember_customer' => Str::random(10),
        ];
    }
}