<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'     => $this->faker->name,
            'course_no' => $this->faker->numberBetween(0, 999999),
            'overview'  => $this->faker->paragraph,
            'about'     => $this->faker->sentences(3, true),
            'user_id'   => User::firstOrFail()->id,
        ];
    }
}
