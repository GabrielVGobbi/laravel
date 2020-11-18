@csrf
<input type="hidden" id="user_id" value="{{ $user->id ?? '' }}" />
<div class="card-body">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="input--name">Nome</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="input--name" value="{{ $user->name ?? old('name') }}" autocomplete="off">

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="input--email">Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="input--email" value="{{ $user->email ?? old('email') }}" autocomplete="off">

            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="input--password">Senha</label>
                <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" id="input--password" value="{{ $user->password ?? old('password') }}" autocomplete="off">

            </div>
        </div>

        <div class="col-md-12 mg-t-10">
            <div class="custom-control custom-switch">
                <input type="checkbox" name="is_active" class="custom-control-input"
                    id="input--is_active" {{ isset($user->is_active) && $user->is_active == '0' ? 'checked' : '' }} value="0">
                <label class="custom-control-label" for="input--is_active">Ativo</label>
            </div>
        </div>

    </div>
</div>

<div class="card-footer">
        <button type="submit" class="btn btn-success">
            <i class='fas fa-edit'></i> Salvar
        </button>
    <a href="{{ route('users.index') }}" class="btn btn-danger">
        <i class='fas fa-undo-alt'></i> Cancelar
    </a>
</div>
