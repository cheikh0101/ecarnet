@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>
                    Liste des patients
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col d-flex justify-content-start">
                <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="Recherche">
            </div>
            <div class="col d-flex justify-content-end">
                <a href=" {{ route('dashboard.user.create') }} " class="btn btn-primary">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Ajouter un patient
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
                                    Matricule
                                </th>

                                <th>
                                    Téléphone
                                </th>

                                <th colspan="3" class="text-center">
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <div class="d-none">
                                {{ $id = 1 }}
                            </div>

                            @forelse ($patients as $user)
                                <tr>
                                    <th>
                                        {{ $id++ }}
                                    </th>

                                    <td>
                                        {{ $user->name }}
                                    </td>

                                    <td>
                                        {{ $user->matricule }}
                                    </td>

                                    <td>
                                        {{ $user->telephone }}
                                    </td>

                                    <td>
                                        <a href=" {{ route('dashboard.user.show', compact('user')) }} "
                                            class="btn btn-outline-primary">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <a href=" {{ route('dashboard.user.edit', compact('user')) }} "
                                            class="btn btn-outline-warning">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <form action=" {{ route('dashboard.user.destroy', compact('user')) }} "
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <p>
                                    Aucun patient trouvé
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
                                    Matricule
                                </th>

                                <th>
                                    Téléphone
                                </th>

                                <th colspan="3" class="text-center">
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
