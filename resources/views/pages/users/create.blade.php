@extends('layouts.app')

@section('title', 'Cadastrar Usuário')

@section('content')
    <div class="container">
        <h1 class="text-center">Novo Usuário</h1>
        <div class="card mt-3">
            <form role="form" class="needs-validation" enctype="multipart/form-data" novalidate id="form" autocomplete="off" novalidate="novalidate" action="{{ route('users.store') }}" method="POST">
                @include('_partials.forms.form_users')
            </form>
        </div>
    </div>
@stop
