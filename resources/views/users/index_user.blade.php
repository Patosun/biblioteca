<x-app-layout>
    <h2>Lista de usuarios</h2>

    <div>
        <a href="{{ route('users.create') }}">Nuevo usuario</a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left">Código</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Nombre</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Apellido paterno</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Apellido materno</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Teléfono</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Dirección</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-2">{{ $user->code }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->paterno }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->materno }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->telefono }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->direccion }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
