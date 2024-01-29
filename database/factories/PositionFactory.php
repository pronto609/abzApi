<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    public static array $positions = [
        'Security',
        'Designer',
        'Content manager',
        'Lawyer',
    ];

    protected static int $num = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => self::$num <= count(self::$positions) ? self::$positions[self::$num++] : 'tester'
        ];
    }
}
