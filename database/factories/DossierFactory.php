<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Dossier;

class DossierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dossier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numero' => $this->faker->word,
            'datenaissance' => $this->faker->word,
            'cni' => $this->faker->word,
            'antecedent_medicaux' => $this->faker->text,
            'antecedent_chirugicaux' => $this->faker->text,
            'antecedent_familiaux' => $this->faker->text,
            'enabled' => $this->faker->boolean,
        ];
    }
}
