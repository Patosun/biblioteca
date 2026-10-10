<x-app-layout>
        <div class="mx-auto max-w-5xl px-4 py-8 sm:px-6 lg:px-8 lg:py-12">
            <a href="{{ route('users.index') }}" class="mb-6 inline-flex items-center gap-2 rounded-lg text-sm font-medium text-gray-600 transition hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <i class="fas fa-arrow-left text-xs" aria-hidden="true"></i>
                Volver a usuarios
            </a>
            <div class="mb-8 flex items-center gap-4">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-indigo-100 text-xl text-indigo-700">
                    <i class="fas fa-user-pen" aria-hidden="true"></i>
                </div>
                <div>
                    <p class="mb-1 text-xs font-semibold uppercase tracking-widest text-indigo-600">Biblioteca · Usuarios</p>
                    <h1 class="text-2xl font-semibold tracking-tight text-gray-900 sm:text-3xl">Editar usuario</h1>
                <p class="mt-2 text-sm text-gray-500">Consulta y edita los datos del usuario.</p>
            </div>
        </div>
        <form action="{{ route('users.update', $usuario->code) }}" method="POST" class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">
            @csrf
            @method('PUT')
            <div class="border-b border-gray-100 px-6 py-5 sm:px-8">
                <h2 class="text-base font-semibold text-gray-900">Información del usuario</h2>
                <p class="mt-1 text-sm text-gray-500">Datos personales y de contacto.</p>
            </div>
            <div class="p-6 sm:p-8">
                @if (session('error'))
                    <div role="alert" class="mb-6 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                        <i class="fas fa-circle-exclamation mt-0.5" aria-hidden="true"></i>
                        <p>{{ session('error') }}</p>
                    </div>
                @endif
                <div class="grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-2">
                    <div>
                        <label for="name" class="mb-2 block text-sm font-medium text-gray-700">Nombre</label>
                        <input id="name" type="text" name="name" value="{{ old('name', $usuario->name) }}" class="block w-full rounded-xl border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:bg-white focus:ring-indigo-500 @error('name') border-red-400 @enderror" @error('name') aria-invalid="true" aria-describedby="name-error" @enderror>
                        @error('name')
                            <p id="name-error" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="materno" class="mb-2 block text-sm font-medium text-gray-700">Apellido materno</label>
                        <input id="materno" type="text" name="materno" value="{{ old('materno', $usuario->materno) }}" class="block w-full rounded-xl border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:bg-white focus:ring-indigo-500 @error('materno') border-red-400 @enderror" @error('materno') aria-invalid="true" aria-describedby="materno-error" @enderror>
                        @error('materno')
                            <p id="materno-error" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="paterno" class="mb-2 block text-sm font-medium text-gray-700">Apellido paterno</label>
                        <input id="paterno" type="text" name="paterno" value="{{ old('paterno', $usuario->paterno) }}" class="block w-full rounded-xl border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:bg-white focus:ring-indigo-500 @error('paterno') border-red-400 @enderror" @error('paterno') aria-invalid="true" aria-describedby="paterno-error" @enderror>
                        @error('paterno')
                            <p id="paterno-error" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium text-gray-700">Correo electrónico</label>
                        <input id="email" type="email" name="email" value="{{ old('email', $usuario->email) }}" class="block w-full rounded-xl border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:bg-white focus:ring-indigo-500 @error('email') border-red-400 @enderror" @error('email') aria-invalid="true" aria-describedby="email-error" @enderror>
                        @error('email')
                            <p id="email-error" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="direccion" class="mb-2 block text-sm font-medium text-gray-700">Dirección</label>
                        <input id="direccion" type="text" name="direccion" value="{{ old('direccion', $usuario->direccion) }}" class="block w-full rounded-xl border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:bg-white focus:ring-indigo-500 @error('direccion') border-red-400 @enderror" @error('direccion') aria-invalid="true" aria-describedby="direccion-error" @enderror>
                        @error('direccion')
                            <p id="direccion-error" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="carnet" class="mb-2 block text-sm font-medium text-gray-700">Carnet de identidad</label>
                        <input id="carnet" type="text" name="carnet" value="{{ old('carnet', $usuario->carnet) }}" class="block w-full rounded-xl border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:bg-white focus:ring-indigo-500 @error('carnet') border-red-400 @enderror" @error('carnet') aria-invalid="true" aria-describedby="carnet-error" @enderror>
                        @error('carnet')
                            <p id="carnet-error" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="telefono" class="mb-2 block text-sm font-medium text-gray-700">Teléfono</label>
                        <input id="telefono" type="text" name="telefono" value="{{ old('telefono', $usuario->telefono) }}" class="block w-full rounded-xl border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:bg-white focus:ring-indigo-500 @error('telefono') border-red-400 @enderror" @error('telefono') aria-invalid="true" aria-describedby="telefono-error" @enderror>
                        @error('telefono')
                            <p id="telefono-error" class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex flex-col-reverse gap-3 border-t border-gray-100 bg-gray-50 px-6 py-5 sm:flex-row sm:justify-end sm:px-8">
                <a href="{{ route('users.index') }}" class="inline-flex items-center justify-center rounded-xl border border-gray-300 bg-white px-5 py-2.5 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancelar</a>
                <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <i class="fas fa-check" aria-hidden="true"></i>
                    Guardar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
