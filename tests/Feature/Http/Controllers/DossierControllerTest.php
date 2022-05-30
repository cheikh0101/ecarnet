<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Dossier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DossierController
 */
class DossierControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $dossiers = Dossier::factory()->count(3)->create();

        $response = $this->get(route('dossier.index'));

        $response->assertOk();
        $response->assertViewIs('dossier.index');
        $response->assertViewHas('dossiers');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('dossier.create'));

        $response->assertOk();
        $response->assertViewIs('dossier.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DossierController::class,
            'store',
            \App\Http\Requests\DossierStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $numero = $this->faker->word;
        $cni = $this->faker->word;
        $enabled = $this->faker->boolean;

        $response = $this->post(route('dossier.store'), [
            'numero' => $numero,
            'cni' => $cni,
            'enabled' => $enabled,
        ]);

        $dossiers = Dossier::query()
            ->where('numero', $numero)
            ->where('cni', $cni)
            ->where('enabled', $enabled)
            ->get();
        $this->assertCount(1, $dossiers);
        $dossier = $dossiers->first();

        $response->assertRedirect(route('dossier.index'));
        $response->assertSessionHas('dossier.id', $dossier->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $dossier = Dossier::factory()->create();

        $response = $this->get(route('dossier.show', $dossier));

        $response->assertOk();
        $response->assertViewIs('dossier.show');
        $response->assertViewHas('dossier');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $dossier = Dossier::factory()->create();

        $response = $this->get(route('dossier.edit', $dossier));

        $response->assertOk();
        $response->assertViewIs('dossier.edit');
        $response->assertViewHas('dossier');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DossierController::class,
            'update',
            \App\Http\Requests\DossierUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $dossier = Dossier::factory()->create();
        $numero = $this->faker->word;
        $cni = $this->faker->word;
        $enabled = $this->faker->boolean;

        $response = $this->put(route('dossier.update', $dossier), [
            'numero' => $numero,
            'cni' => $cni,
            'enabled' => $enabled,
        ]);

        $dossier->refresh();

        $response->assertRedirect(route('dossier.index'));
        $response->assertSessionHas('dossier.id', $dossier->id);

        $this->assertEquals($numero, $dossier->numero);
        $this->assertEquals($cni, $dossier->cni);
        $this->assertEquals($enabled, $dossier->enabled);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $dossier = Dossier::factory()->create();

        $response = $this->delete(route('dossier.destroy', $dossier));

        $response->assertRedirect(route('dossier.index'));

        $this->assertModelMissing($dossier);
    }
}
