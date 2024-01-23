<div>
    <div class="col-6">
        <p class="lead">Filtro</p>
        <input type="text" wire:model.debounce.500ms="search" class="form-control">
    </div>


    @foreach ($users as $user)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="selected_users[]" value="{{ $user->id }}">
            <label class="form-check-label"><h2>{{ $user->name }}</h2></label>
        </div>

        <b>Permissões do Utilizador:</b> <br>
        @foreach ($permitions as $permition)
            <div class="form-check">
                <input class="form-check-input user-permission" type="checkbox" name="selected_user_permissions[{{ $user->id }}][]" value="{{ $permition->id }}">
                <label class="form-check-label">{{ $permition->types }}</label>
            </div>
        @endforeach
        @error('permition') <span class="text-danger">{{ $message }}</span><br>@enderror
    @endforeach

    {{ $users->links() }}
</div>
