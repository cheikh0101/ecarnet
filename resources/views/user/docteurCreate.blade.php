@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class=" col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Nouveau Docteur
                    </div>
                    <div class="card-body">
                        <form action=" {{ route('docteurStore') }} " method="post">
                            @csrf
                            <div class="row mt-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Prénom et nom</label>
                                        <input type="text" name="name" id="" class="form-control" placeholder="Macky Sall"
                                            aria-describedby="helpId">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" id="" class="form-control"
                                            placeholder="macky@gmail.com" aria-describedby="helpId">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Téléphone</label>
                                        <input type="number" min="8" name="telephone" id="" class="form-control"
                                            placeholder="77 111 98 77" aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Genre</label>
                                        <select class="form-control" name="genre" id="">
                                            <option value="M">Masculin</option>
                                            <option value="F">Féminin</option>
                                        </select>
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
