<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\Roles;
use Faker\Generator as Faker;

// $factory->define(Admin::class, function (Faker $faker){
//     return [
//         'admin_name' => $this->faker->name(),
//         'admin_email' => $this->faker->unique()->safeEmail(),
//         'admin_phone' => '0989189189',
//         'admin_password' => 'e10adc3949ba59abbe56e057f20f883e',
//         'admin_status' => '1',
//         'created_at' => now(),
//     ];
// });
// $factory->afterCreating(Admin::class, function($admin, $faker){
//     $roles = Roles::where('name',"user")->get();
//     $admin->roles()->sync($roles->pluck('id_roles')->toArray());
// }
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'admin_name' => $this->faker->name(),
            'admin_email' => $this->faker->unique()->safeEmail(),
            'admin_phone' => '0989189189',
            'admin_password' => 'e10adc3949ba59abbe56e057f20f883e',
            'admin_status' => '1',
            'created_at' => now(),
        ];
    }


    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
