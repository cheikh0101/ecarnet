@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class=" col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Nouvelle consultation
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('dashboard.consultation.store') }} " method="post">
                            @csrf

                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Pouls</label>
                                        <input type="text" class="form-control" name="pouls" id=""
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Fréquence respiratoire</label>
                                        <input type="text" class="form-control" name="frequence_respiratoire" id=""
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Température</label>
                                        <input type="text" class="form-control" name="temperature" id=""
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Symptomes</label>
                                        <textarea class="form-control" name="symptomes" id="" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Médicaments prescrits</label>
                                        <textarea class="form-control" name="medicament_prescrits" id="" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Historique Maladie</label>
                                        <textarea class="form-control" name="historique_maladie" id="" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Tension Arterielle</label>
                                        <textarea class="form-control" name="tension_arterielle" id="" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col">
                                    <button type="submit" class="btn btn-outline-primary">
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                        Enregistrer
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
