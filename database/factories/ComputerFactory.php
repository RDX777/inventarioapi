<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ComputerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'processor' => $this->faker->name(),
            'memory_size' => $this->faker->randomDigit(),
            'video' => $this->faker->name(),
            'video_size'=>$this->faker->randomDigit(),
            'hard_disk_size'=>$this->faker->randomDigit(),
            'ssd_size'=>$this->faker->randomDigit(),
            'network_cable_mac'=>$this->faker->macAddress(),
            'network_wireless_mac'=>$this->faker->macAddress(),
            'manufacturer_name'=>$this->faker->company(),                
            'is_notebook'=>$this->faker->boolean($chanceOfGettingTrue = 50),
            'comments'=>$this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'model'=>$this->faker->word(),
            'serial_number'=>$this->faker->unixTime($max = 'now'),
            'hostname' => $this->faker->unixTime($max = 'now')
            //
        ];
    }
}
