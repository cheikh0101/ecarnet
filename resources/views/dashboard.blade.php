@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="col d-flex justify-content-end">
                    Date et heure : {{ date('h:i:sa -- d/m/Y') }}
                </div>
            </div>
        </div>
    </div>
    <div style="height: 100px"></div>
    <div class="container">
        <div class="row mt-5">
            <div class="col d-flex d-flex justify-content-center">
                <div class="card text-success border-success mb-3" style="max-width: 18rem;">
                    <div class="card-header text-center">Nombre Patient</div>
                    <div class="card-body">
                        <p class="card-text text-center fs-1">
                            @if ($patients)
                                {{ count($patients) }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="col d-flex justify-content-center">
                <div class="card text-success border-success mb-3" style="max-width: 18rem;">
                    <div class="card-header text-center">Rendez - vous</div>
                    <div class="card-body">
                        <p class="card-text text-center fs-1">
                            {{ count($rendezVous) }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col d-flex justify-content-center">
                    <div class="card text-success border-success mb-3" style="max-width: 18rem;">
                        <div class="card-header text-center">Patient Homme</div>
                        <div class="card-body">
                            <p class="card-text text-center fs-1">
                                {{ count($patientHomme) }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card text-success border-success mb-3" style="max-width: 18rem;">
                        <div class="card-header text-center">Patient Femme</div>
                        <div class="card-body">
                            <p class="card-text text-center fs-1">
                                {{ count($patientFemme) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
