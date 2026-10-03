<x-app-layout>
<div>
    <form action="/users" method="POST">
        @csrfs
        <div>
            <label for="name">Nombre</label>
            <input type="text" class="rounded-lg border-gray-400" name="name" value="{{ old('name') }}">
            @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">Apellido Materno</label>
            <input type="text" class="rounded-lg border-gray-400" name="materno" value="{{ old('materno') }}">
            @error('materno')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">Apellido Paterno</label>
            <input type="text" class="rounded-lg border-gray-400" name="paterno" value="{{ old('paterno') }}">
            @error('paterno')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" class="rounded-lg border-gray-400" name="email" value="{{ old('email') }}">
            @error('email')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">Direccion</label>
            <input type="text" class="rounded-lg border-gray-400" name="direccion" value="{{ old('direccion') }}">
            @error('direccion')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">Carnet</label>
            <input type="text" class="rounded-lg border-t-slate-400" name="carnet" value="{{ old('carnet') }}">
            @error('carnet')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">Telefono</label>
            <input type="text" class="rounded-lg border-gray-400" name="telefono" value="{{ old('telefono') }}">
            @error('telefono')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
    </form>
    <button type="submit" class="rounded-full bg-slate-400">Guardar</button>
</div>
</x-app-layout>
