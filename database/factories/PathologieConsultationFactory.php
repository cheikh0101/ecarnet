<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Consultation;
use App\Models\Pathologie;
use App\Models\PathologieConsultation;

class PathologieConsultationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PathologieConsultation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pathologie_id' => Pathologie::factory(),
            'consultation_id' => Consultation::factory(),
        ];
    }
}
