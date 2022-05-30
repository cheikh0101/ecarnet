<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Consultation;
use App\Models\Document;
use App\Models\Type;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ConsultationController
 */
class ConsultationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $consultations = Consultation::factory()->count(3)->create();

        $response = $this->get(route('consultation.index'));

        $response->assertOk();
        $response->assertViewIs('consultation.index');
        $response->assertViewHas('consultations');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('consultation.create'));

        $response->assertOk();
        $response->assertViewIs('consultation.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ConsultationController::class,
            'store',
            \App\Http\Requests\ConsultationStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $type = Type::factory()->create();
        $document = Document::factory()->create();
        $user_email = $this->faker->word;

        $response = $this->post(route('consultation.store'), [
            'type_id' => $type->id,
            'document_id' => $document->id,
            'user_email' => $user_email,
        ]);

        $consultations = Consultation::query()
            ->where('type_id', $type->id)
            ->where('document_id', $document->id)
            ->where('user_email', $user_email)
            ->get();
        $this->assertCount(1, $consultations);
        $consultation = $consultations->first();

        $response->assertRedirect(route('consultation.index'));
        $response->assertSessionHas('consultation.id', $consultation->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $consultation = Consultation::factory()->create();

        $response = $this->get(route('consultation.show', $consultation));

        $response->assertOk();
        $response->assertViewIs('consultation.show');
        $response->assertViewHas('consultation');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $consultation = Consultation::factory()->create();

        $response = $this->get(route('consultation.edit', $consultation));

        $response->assertOk();
        $response->assertViewIs('consultation.edit');
        $response->assertViewHas('consultation');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ConsultationController::class,
            'update',
            \App\Http\Requests\ConsultationUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $consultation = Consultation::factory()->create();
        $type = Type::factory()->create();
        $document = Document::factory()->create();
        $user_email = $this->faker->word;

        $response = $this->put(route('consultation.update', $consultation), [
            'type_id' => $type->id,
            'document_id' => $document->id,
            'user_email' => $user_email,
        ]);

        $consultation->refresh();

        $response->assertRedirect(route('consultation.index'));
        $response->assertSessionHas('consultation.id', $consultation->id);

        $this->assertEquals($type->id, $consultation->type_id);
        $this->assertEquals($document->id, $consultation->document_id);
        $this->assertEquals($user_email, $consultation->user_email);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $consultation = Consultation::factory()->create();

        $response = $this->delete(route('consultation.destroy', $consultation));

        $response->assertRedirect(route('consultation.index'));

        $this->assertModelMissing($consultation);
    }
}
