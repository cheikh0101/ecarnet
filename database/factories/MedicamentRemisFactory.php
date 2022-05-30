<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Consultation;
use App\Models\Medicament;
use App\Models\MedicamentRemis;

class MedicamentRemisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MedicamentRemis::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'consultation_id' => Consultation::factory(),
            'medicament_id' => Medicament::factory(),
            'quantite' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
