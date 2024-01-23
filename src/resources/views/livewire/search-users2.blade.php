<div>
    <div class="row">
        <div class="col-6">
            <p class="lead">Filtro</p>
            <input type="text" wire:model.debounce.500ms="search" class="form-control">
        </div>
        <div class="col-4">
            <p class="lead">Departamento</p>

            <select wire:model="department" class="form-control" name="department" id="department">
                <option value=""></option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>

        </div>
    </div>

    <div class="row mt-5">
        <div class="col">
            @can('create', \App\Models\User::class)
                <p class="text-right">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus fa-fw mr-2"></i>Adicionar Utilizador
                    </a>
                </p>
            @endcan

            @if(collect($selectedUsers)->filter(function ($element, $uuid) { return $element == true;})->count() > 0)
                <button wire:click="deleteSelected" class="btn btn-lg btn-danger">Apagar Selecionados</button>
            @endif

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Departamento</th>
                    <th class="text-end">Acções</th>
                </tr>
                </thead>

                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <input type="checkbox" wire:model="selectedUsers.{{ $user->id }}">
                        </td>


                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ optional($user->department)->name }}</td>
                        <td class="text-end">
                            <a href="{{ route('users.show', ['user' => $user]) }}" class="btn btn-primary btn-sm">Ver</a>

                            @can('update', $user)
                                <a href="{{ route('users.edit', ['user' => $user]) }}"
                                   class="btn btn-warning btn-sm">Modificar</a>
                            @endcan

                            @can('delete', $user)
                                @if ($user->id == $userId)
                                    <button wire:click="deleteUser({{ $user->id }})" class="btn btn-danger">Tem a
                                        certeza?
                                    </button>
                                @else
                                    <button wire:click="deleteUser({{ $user->id }})" class="btn btn-danger">Apaga
                                    </button>
                                @endif

                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

             {{ $users->links() }}
        </div>
    </div>
</div>