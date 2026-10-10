<div>
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 lg:py-12">
        <div class="mb-8 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="mb-2 text-xs font-semibold uppercase tracking-widest text-indigo-600">Biblioteca · Administración</p>
                <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Usuarios</h1>
                <p class="mt-2 text-sm text-gray-500">Consulta los usuarios registrados y accede a sus datos.</p>
            </div>
            <a href="{{ route('users.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <i class="fas fa-plus text-xs" aria-hidden="true"></i>
                Nuevo usuario
            </a>
            <button wire:click="openModal" class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <i class="fas fa-plus text-xs" aria-hidden="true"></i>
                Nuevo usuario
            </button>
        </div>
        <div class="text-right">
            <label for="">buscar usuario</label>
            <input type="search" placeholder="Buscar usuario..." wire:model.live="search">
        </div>
        <div>
            <label for="">mostrar:</label>
            <select name="perPage" wire:model.live="n_registros">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
        </div>

        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">
            <div class="flex items-center gap-3 border-b border-gray-100 px-6 py-5">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                    <i class="fas fa-users" aria-hidden="true"></i>
                </div>
                <h2 class="text-base font-semibold text-gray-900">Lista de usuarios</h2>
                <span class="inline-flex rounded-full bg-gray-100 px-2.5 py-1 text-xs font-semibold text-gray-600">{{ $users->count() }}</span>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse text-left text-sm">
                    <caption class="sr-only">Usuarios registrados en la biblioteca</caption>
                    <thead class="border-b border-gray-200 bg-gray-50 text-xs uppercase tracking-wider text-gray-500">
                        <tr>
                            <th scope="col" class="whitespace-nowrap px-6 py-4 font-semibold">Código</th>
                            <th scope="col" class="whitespace-nowrap px-6 py-4 font-semibold">Nombre</th>
                            <th scope="col" class="whitespace-nowrap px-6 py-4 font-semibold">Apellido paterno</th>
                            <th scope="col" class="whitespace-nowrap px-6 py-4 font-semibold">Apellido materno</th>
                            <th scope="col" class="whitespace-nowrap px-6 py-4 font-semibold">Carnet</th>
                            <th scope="col" class="whitespace-nowrap px-6 py-4 font-semibold">Teléfono</th>
                            <th scope="col" class="whitespace-nowrap px-6 py-4 font-semibold">Dirección</th>
                            <th scope="col" class="whitespace-nowrap px-6 py-4 font-semibold">Email</th>
                            <th scope="col" class="whitespace-nowrap px-6 py-4 font-semibold">Estado</th>
                            <th scope="col" class="whitespace-nowrap px-6 py-4 text-right font-semibold">Editar</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($users as $user)
                            <tr wire:key="usuario-{{ $user->code }}" class="transition-colors hover:bg-indigo-50/50">
                                <td class="px-6 py-4 font-mono text-xs text-gray-500">
                                    <span class="block w-28 truncate" title="{{ $user->code }}">{{ $user->code }}</span>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 font-semibold text-gray-900">{{ $user->name }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-gray-600">{{ $user->paterno }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-gray-600">{{ $user->materno }}</td>
                                <td class="whitespace-nowrap px-6 py-4 tabular-nums text-gray-600">{{ $user->carnet }}</td>
                                <td class="whitespace-nowrap px-6 py-4 tabular-nums text-gray-600">{{ $user->telefono }}</td>
                                <td class="min-w-48 px-6 py-4 text-gray-600">{{ $user->direccion }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-gray-600">{{ $user->email }}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    @if ($user->estado)
                                        <button type="button" wire:click="cambiarEstado(@js($user->code))" wire:loading.attr="disabled" wire:target="cambiarEstado" title="Desactivar usuario" aria-label="Desactivar a {{ $user->name }}" class="inline-flex items-center rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700 ring-1 ring-inset ring-green-600/20 transition hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:cursor-wait disabled:opacity-50">
                                            Activo
                                        </button>
                                    @else
                                        <button type="button" wire:click="cambiarEstado(@js($user->code))" wire:loading.attr="disabled" wire:target="cambiarEstado" title="Activar usuario" aria-label="Activar a {{ $user->name }}" class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600 ring-1 ring-inset ring-gray-500/20 transition hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:cursor-wait disabled:opacity-50">
                                            Inactivo
                                        </button>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('users.edit', $user->code) }}" title="Editar usuario" aria-label="Editar a {{ $user->name }} {{ $user->paterno }}" class="inline-flex items-center gap-2 rounded-lg border border-indigo-100 bg-indigo-50 px-3 py-2 text-xs font-semibold text-indigo-700 transition hover:border-indigo-200 hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                        <i class="fas fa-edit" aria-hidden="true"></i>
                                        Editar
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="px-6 py-16 text-center">
                                    <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-gray-100 text-xl text-gray-400">
                                        <i class="fas fa-users" aria-hidden="true"></i>
                                    </div>
                                    <p class="font-semibold text-gray-900">Todavía no hay usuarios</p>
                                    <p class="mt-2 text-sm text-gray-500">Usa el botón «Nuevo usuario» para comenzar.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
    {{-- modal para registro --}}
    <x-dialog-modal wire:model="modal">
        <x-slot name="title">
            Registro de Usuario
        </x-slot>
        <x-slot name="content">
            <div>
                <x-label for="name" value="nombre"/>
                <x-input id="name" wire:model="name" type="text"/>
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <x-label for="paterno" value="paterno"/>
                <x-input id="paterno" wire:model="paterno" type="text"/>
                @error('paterno') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <x-label for="materno" value="materno"/>
                <x-input id="materno" wire:model="materno" type="text"/>
                @error('materno') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <x-label for="carnet" value="carnet"/>
                <x-input id="carnet" wire:model="carnet" type="text"/>
                @error('carnet') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <x-label for="telefono" value="telefono"/>
                <x-input id="telefono" wire:model="telefono" type="text"/>
                @error('telefono') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <x-label for="email" value="email"/>
                <x-input id="email" wire:model="email" type="email"/>
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <x-label for="direccion" value="direccion"/>
                <x-input id="direccion" wire:model="direccion" type="text"/>
                @error('direccion') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-button type="button" wire:click="guardar" wire:loading.attr="disabled" wire:target="guardar">
                Guardar
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
