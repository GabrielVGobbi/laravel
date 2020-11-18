@extends('layouts.app')

@section('title', 'Usuários')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">Usuários</h1>
            <div class="tollbar btn-toolbar mb-2 mb-md-0 float-right"></div>
        </div>

        <div id="toolbar">
            <div class="form-inline" role="form">
                <div class="btn-group mr-2">
                    <a href="{{ route('users.create') }}" data-toggle="tooltip" data-placement="top" title="Novo"
                        class="btn btn-dark"><i class="fas fa-gamepad"></i>
                        Novo</a>
                </div>
            </div>
        </div>

        <div id="preloader"></div>

        <table data-toggle="table" class="table table-hover table-striped" data-search="true" data-show-refresh="true"
            data-show-columns="true" data-show-columns-toggle-all="true" data-show-export="true" data-pagination="true"
            data-id-field="id" data-page-list="[10, 25, 50, 100, all]" data-cookie="true" data-cookie-id-table="user"
            data-toolbar="#toolbar" data-buttons-class="dark">
            <thead>
                <tr class="text-center">
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-align="left">Nome</th>
                    <th data-align="left">Tipo</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="text-center">
                        <td></td>
                        <td style="text-align:left">{{ $user->name }}</td>
                        <td style="text-align:left">{{ $user->type }}</td>
                        <td>
                            <a href="{{ route('users.show', $user->uuid) }}" data-toggle="tooltip" data-placement="top"
                                title="Visualizar" class="btn btn-xs btn-dark ">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Deletar"
                                onclick="delete_row(this)" data-href="{{ route('users.destroy', $user->uuid) }}"
                                class="btn btn-xs btn-danger btn-delete">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script class="">
        $(window).on('load', function() {
            if ($('#preloader').length) {
                $('#preloader').delay(100).fadeOut('slow', function() {
                    $(this).remove();
                });
            }
        });
    </script>
@endsection
