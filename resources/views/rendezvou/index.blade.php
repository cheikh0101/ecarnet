@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3>
                    Liste des rendez-vous
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col d-flex justify-content-start">
                <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="Recherche">
            </div>
            <div class="col d-flex justify-content-end">
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
                                    Date
                                </th>

                                <th>
                                    Description
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

                            @forelse ($rendezvous as $item)
                                <tr>
                                    <th>
                                        {{ $id++ }}
                                    </th>

                                    <td>
                                        {{ $item->date }}
                                    </td>

                                    <td>
                                        {{ $item->description }}
                                    </td>

                                    <td>
                                        <a href=" {{ route('dashboard.rendezvous.show', compact('item')) }} "
                                            class="btn btn-outline-primary">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <a href=" {{ route('dashboard.rendezvous.edit', compact('item')) }} "
                                            class="btn btn-outline-warning">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-outline-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <p>
                                    Aucun rendez-vous trouvé
                                </p>
                            @endforelse

                        </tbody>

                        <tfoot class="table-dark">
                            <tr>
                                <th>
                                    #
                                </th>

                                <th>
                                    Date
                                </th>

                                <th>
                                    Description
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
