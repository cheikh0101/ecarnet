@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class=" col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Nouveau Dossier
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('dashboard.dossier.store') }} " method="post">
                            @csrf
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Date de naissance</label>
                                        <input type="date" name="datenaissance" id="" class="form-control"
                                            aria-describedby="helpId">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="">CNI</label>
                                        <input type="text" name="cni" id="" class="form-control" placeholder=""
                                            aria-describedby="helpId">
                                    </div>
                                </div>

                                <div class="col d-none">
                                    <div class="form-group">
                                        <label for="">CNI</label>
                                        <input type="text" name="user_id" value=" {{ $user->id }} " id=""
                                            class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Antecedent Medicaux</label>
                                        <textarea class="form-control" name="antecedent_medicaux" id="" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Antecedent Chirugicaux</label>
                                        <textarea class="form-control" name="antecedent_chirugicaux" id="" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Antecedent Familiaux</label>
                                        <textarea class="form-control" name="antecedent_familiaux" id="" rows="3"></textarea>
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
