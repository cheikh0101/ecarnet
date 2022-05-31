@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Informations personnelles
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row mt-5">
                                                    <div class="col">
                                                        <h5>
                                                            Prénom et Nom: {{ $user->name }}
                                                        </h5>
                                                    </div>
                                                    <div class="col">
                                                        <h5>
                                                            Email: {{ $user->email }}
                                                        </h5>
                                                    </div>
                                                    <div class="col">
                                                        <h5>
                                                            Matricule: {{ $user->matricule }}
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="row mt-5">
                                                    <div class="col">
                                                        <h5>
                                                            Genre: {{ $user->genre }}
                                                        </h5>
                                                    </div>
                                                    <div class="col">
                                                        <h5>
                                                            Numéro de Téléphone: {{ $user->telephone }}
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="row mt-5">
                                                    <div class="col">
                                                        <a href="  " class="btn btn-warning">Modifier les informations
                                                            personnelles</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Dossier du patient
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row mt-5">
                                                    <div class="col">
                                                        <h5>
                                                            Numéro Dossier: {{ $dossier->numero }}
                                                        </h5>
                                                    </div>
                                                    <div class="col">
                                                        <h5>
                                                            Date de naissance: {{ $dossier->datenaissance }}
                                                        </h5>
                                                    </div>
                                                    <div class="col">
                                                        <h5>
                                                            CNI: {{ $dossier->cni }}
                                                        </h5>
                                                    </div>
                                                    <div class="col">
                                                        <h5>
                                                            État dossier:
                                                            @if ($dossier->enabled)
                                                                <button class="btn btn-primary">Activé</button>
                                                            @else
                                                                <button type="button"
                                                                    class="btn btn-danger">Désactivé</button>
                                                            @endif
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="row mt-5">
                                                    <div class="col">
                                                        <h5>
                                                            Antécédent Médicaux: {{ $dossier->antecedent_medicaux }}
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="row mt-5">
                                                    <div class="col">
                                                        <h5>
                                                            Antécédent Chirugicaux:
                                                            {{ $dossier->antecedent_chirugicaux }}
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="row mt-5">
                                                    <div class="col">
                                                        <h5>
                                                            Antécédent familiaux: {{ $dossier->antecedent_familiaux }}
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3 ml-2">
                                                <div class="col">
                                                    <a href="" class="btn btn-warning">Modifier le dossier</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                Consultation
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex justify-content-end">
                                            <a href=" {{ route('dashboard.consultation.create') }} "
                                                class="btn btn-primary">
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                Nouvelle Consultation
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Symptomes</th>
                                                    <th>Medicaments prescrits</th>
                                                    <th>Date</th>
                                                    <th colspan="3">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($consultations as $consultation)
                                                    <tr>
                                                        <td scope="row"> {{ $consultation->id }} </td>
                                                        <td> {{ $consultation->symptomes }} </td>
                                                        <td> {{ $consultation->medicament_prescrits }} </td>
                                                        <td> {{ $consultation->created_at }} </td>
                                                        <td>
                                                            <a href=" {{ route('dashboard.consultation.show', compact('consultation')) }} "
                                                                class="btn btn-outline-primary">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a href=" {{ route('dashboard.consultation.edit', compact('consultation')) }} "
                                                                class="btn btn-outline-warning">
                                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <button type="button" class="btn btn-outline-danger">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </button>
                                                        </td>
                                                    @empty
                                                        <p>Aucune consultation pour ce patient</p>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
