<x-app-layout>
    <h2>Lista de usuarios</h2>

    <div>
        <a href="">Nuevo usuario</a>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th class="py-2 font-semibold">Código</th>
                    <th class="py-2 font-semibold">Nombre</th>
                    <th class="py-2 font-semibold">Apellido paterno</th>
                    <th class="py-2 font-semibold">Apellido materno</th>
                    <th class="py-2 font-semibold">Teléfono</th>
                    <th class="py-2 font-semibold">Dirección</th>
                    <th class="py-2 font-semibold">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->code }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->paterno }}</td>
                        <td>{{ $user->materno }}</td>
                        <td>{{ $user->telefono }}</td>
                        <td>{{ $user->direccion }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
