<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserInfo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInfo>
 */
class UserInfoFactory extends Factory
{
      /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserInfo::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'city' => $this->faker->city(),
            'date_of_birth'=>$this->faker->dateTimeBetween('1990-01-01', '2012-12-31')
            ->format('Y-m-d'),
            'status'=> $this->faker->randomElement(['Active','In-Active'])
        ];
    }
}
