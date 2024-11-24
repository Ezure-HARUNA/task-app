<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $faker = FakerFactory::create('ja_JP'); // 日本語ロケールを設定

    return [
      'title' => $faker->realText(15),
      'description' => $faker->realText(30),
      'long_description' => $faker->realText(150),
      'completed' => $faker->boolean,
      'created_at' => now(),
      'updated_at' => now(),
    ];
  }
}
