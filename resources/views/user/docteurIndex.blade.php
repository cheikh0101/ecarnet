@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>
                    Liste des Docteurs
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col d-flex justify-content-start">
                <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="Recherche">
            </div>
            <div class="col d-flex justify-content-end">
                <a href=" {{ route('docteurCreate') }} " class="btn btn-primary">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Ajouter un docteur
                </a>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>
                                    #
                                </th>

                                <th>
                                    Prénom et Nom
                                </th>

                                <th>
                                    Email
                                </th>

                                <th>
                                    Matricule
                                </th>

                                <th>
                                    Téléphone
                                </th>

                                <th>
                                    Genre
                                </th>

                                <th colspan="2" class="text-center">
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <div class="d-none">
                                {{ $id = 1 }}
                            </div>

                            @forelse ($docteurs as $user)
                                <tr>
                                    <th>
                                        {{ $id++ }}
                                    </th>

                                    <td>
                                        {{ $user->name }}
                                    </td>

                                    <td>
                                        {{ $user->email }}
                                    </td>

                                    <td>
                                        {{ $user->matricule }}
                                    </td>

                                    <td>
                                        {{ $user->telephone }}
                                    </td>

                                    <td>
                                        {{ $user->genre }}
                                    </td>

                                    <td>
                                        <a class="btn btn-outline-warning">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <form action=" {{ route('docteurDestroy', compact('user')) }} " method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submi" class="btn btn-outline-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <p>
                                    Aucun Membre trouvé
                                </p>
                            @endforelse

                        </tbody>

                        <tfoot class="table-dark">
                            <tr>
                                <th>
                                    #
                                </th>

                                <th>
                                    Prénom et Nom
                                </th>

                                <th>
                                    Email
                                </th>

                                <th>
                                    Matricule
                                </th>

                                <th>
                                    Téléphone
                                </th>

                                <th>
                                    Genre
                                </th>

                                <th colspan="2" class="text-center">
                                    Actions
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
