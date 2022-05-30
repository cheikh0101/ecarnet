<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Dossier;
use App\Models\Rendezvou;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RendezvousController
 */
class RendezvousControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $rendezvous = Rendezvous::factory()->count(3)->create();

        $response = $this->get(route('rendezvou.index'));

        $response->assertOk();
        $response->assertViewIs('rendezvou.index');
        $response->assertViewHas('rendezvous');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('rendezvou.create'));

        $response->assertOk();
        $response->assertViewIs('rendezvou.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RendezvousController::class,
            'store',
            \App\Http\Requests\RendezvousStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $date = $this->faker->word;
        $dossier = Dossier::factory()->create();

        $response = $this->post(route('rendezvou.store'), [
            'date' => $date,
            'dossier_id' => $dossier->id,
        ]);

        $rendezvous = Rendezvou::query()
            ->where('date', $date)
            ->where('dossier_id', $dossier->id)
            ->get();
        $this->assertCount(1, $rendezvous);
        $rendezvou = $rendezvous->first();

        $response->assertRedirect(route('rendezvou.index'));
        $response->assertSessionHas('rendezvou.id', $rendezvou->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $rendezvou = Rendezvous::factory()->create();

        $response = $this->get(route('rendezvou.show', $rendezvou));

        $response->assertOk();
        $response->assertViewIs('rendezvou.show');
        $response->assertViewHas('rendezvou');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $rendezvou = Rendezvous::factory()->create();

        $response = $this->get(route('rendezvou.edit', $rendezvou));

        $response->assertOk();
        $response->assertViewIs('rendezvou.edit');
        $response->assertViewHas('rendezvou');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RendezvousController::class,
            'update',
            \App\Http\Requests\RendezvousUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $rendezvou = Rendezvous::factory()->create();
        $date = $this->faker->word;
        $dossier = Dossier::factory()->create();

        $response = $this->put(route('rendezvou.update', $rendezvou), [
            'date' => $date,
            'dossier_id' => $dossier->id,
        ]);

        $rendezvou->refresh();

        $response->assertRedirect(route('rendezvou.index'));
        $response->assertSessionHas('rendezvou.id', $rendezvou->id);

        $this->assertEquals($date, $rendezvou->date);
        $this->assertEquals($dossier->id, $rendezvou->dossier_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $rendezvou = Rendezvous::factory()->create();
        $rendezvou = Rendezvou::factory()->create();

        $response = $this->delete(route('rendezvou.destroy', $rendezvou));

        $response->assertRedirect(route('rendezvou.index'));

        $this->assertModelMissing($rendezvou);
    }
}
