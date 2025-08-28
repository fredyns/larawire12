<?php

namespace Database\Factories\Sample;

use App\Enums\Sample\SampleRecordEnumerate;
use App\Models\Sample\SampleRecord;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SampleRecordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SampleRecord::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userFactory = User::factory();

        return [
            'id' => Str::uuid(),
            'user_id' => $userFactory,
            'string' => $this->faker->city(),
            'email' => $this->faker->email(),
            'n_p_w_p' => $this->faker->numerify('##.###.###.#-###.###'),
            'integer' => $this->faker->randomNumber(0),
            'decimal' => $this->faker->randomNumber(1),
            'datetime' => $this->faker->dateTime(),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'i_p_address' => $this->faker->ipv4(),
            'boolean' => $this->faker->boolean(),
            'enumerate' => $this->faker->randomElement(SampleRecordEnumerate::values()),
            'text' => $this->faker->text(),
            'markdown_text' => $this->faker->text(),
            'w_y_s_i_w_y_g' => $this->faker->text(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'created_by' => $userFactory,
            'updated_by' => $userFactory,
        ];
    }
}
