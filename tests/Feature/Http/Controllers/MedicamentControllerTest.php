<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MedicamentController
 */
class MedicamentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $medicaments = Medicament::factory()->count(3)->create();

        $response = $this->get(route('medicament.index'));

        $response->assertOk();
        $response->assertViewIs('medicament.index');
        $response->assertViewHas('medicaments');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('medicament.create'));

        $response->assertOk();
        $response->assertViewIs('medicament.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MedicamentController::class,
            'store',
            \App\Http\Requests\MedicamentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $nom = $this->faker->word;

        $response = $this->post(route('medicament.store'), [
            'nom' => $nom,
        ]);

        $medicaments = Medicament::query()
            ->where('nom', $nom)
            ->get();
        $this->assertCount(1, $medicaments);
        $medicament = $medicaments->first();

        $response->assertRedirect(route('medicament.index'));
        $response->assertSessionHas('medicament.id', $medicament->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $medicament = Medicament::factory()->create();

        $response = $this->get(route('medicament.show', $medicament));

        $response->assertOk();
        $response->assertViewIs('medicament.show');
        $response->assertViewHas('medicament');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $medicament = Medicament::factory()->create();

        $response = $this->get(route('medicament.edit', $medicament));

        $response->assertOk();
        $response->assertViewIs('medicament.edit');
        $response->assertViewHas('medicament');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MedicamentController::class,
            'update',
            \App\Http\Requests\MedicamentUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $medicament = Medicament::factory()->create();
        $nom = $this->faker->word;

        $response = $this->put(route('medicament.update', $medicament), [
            'nom' => $nom,
        ]);

        $medicament->refresh();

        $response->assertRedirect(route('medicament.index'));
        $response->assertSessionHas('medicament.id', $medicament->id);

        $this->assertEquals($nom, $medicament->nom);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $medicament = Medicament::factory()->create();

        $response = $this->delete(route('medicament.destroy', $medicament));

        $response->assertRedirect(route('medicament.index'));

        $this->assertModelMissing($medicament);
    }
}
