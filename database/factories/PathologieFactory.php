<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Dossier;
use App\Models\Pathologie;

class PathologieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pathologie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dossier_id' => Dossier::factory(),
            'symptomes' => $this->faker->text,
            'medicament_prescrits' => $this->faker->text,
            'historique_maladie' => $this->faker->text,
            'tension_arterielle' => $this->faker->text,
            'temperature' => $this->faker->text,
            'pouls' => $this->faker->text,
            'frequence_respiratoire' => $this->faker->text,
        ];
    }
}
