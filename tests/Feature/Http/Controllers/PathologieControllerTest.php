<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Dossier;
use App\Models\Pathologie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PathologieController
 */
class PathologieControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $pathologies = Pathologie::factory()->count(3)->create();

        $response = $this->get(route('pathologie.index'));

        $response->assertOk();
        $response->assertViewIs('pathologie.index');
        $response->assertViewHas('pathologies');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('pathologie.create'));

        $response->assertOk();
        $response->assertViewIs('pathologie.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PathologieController::class,
            'store',
            \App\Http\Requests\PathologieStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $dossier = Dossier::factory()->create();
        $symptomes = $this->faker->text;

        $response = $this->post(route('pathologie.store'), [
            'dossier_id' => $dossier->id,
            'symptomes' => $symptomes,
        ]);

        $pathologies = Pathologie::query()
            ->where('dossier_id', $dossier->id)
            ->where('symptomes', $symptomes)
            ->get();
        $this->assertCount(1, $pathologies);
        $pathologie = $pathologies->first();

        $response->assertRedirect(route('pathologie.index'));
        $response->assertSessionHas('pathologie.id', $pathologie->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $pathologie = Pathologie::factory()->create();

        $response = $this->get(route('pathologie.show', $pathologie));

        $response->assertOk();
        $response->assertViewIs('pathologie.show');
        $response->assertViewHas('pathologie');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $pathologie = Pathologie::factory()->create();

        $response = $this->get(route('pathologie.edit', $pathologie));

        $response->assertOk();
        $response->assertViewIs('pathologie.edit');
        $response->assertViewHas('pathologie');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PathologieController::class,
            'update',
            \App\Http\Requests\PathologieUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $pathologie = Pathologie::factory()->create();
        $dossier = Dossier::factory()->create();
        $symptomes = $this->faker->text;

        $response = $this->put(route('pathologie.update', $pathologie), [
            'dossier_id' => $dossier->id,
            'symptomes' => $symptomes,
        ]);

        $pathologie->refresh();

        $response->assertRedirect(route('pathologie.index'));
        $response->assertSessionHas('pathologie.id', $pathologie->id);

        $this->assertEquals($dossier->id, $pathologie->dossier_id);
        $this->assertEquals($symptomes, $pathologie->symptomes);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $pathologie = Pathologie::factory()->create();

        $response = $this->delete(route('pathologie.destroy', $pathologie));

        $response->assertRedirect(route('pathologie.index'));

        $this->assertModelMissing($pathologie);
    }
}
