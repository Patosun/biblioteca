<x-app-layout>
    <div x-data="{ abierto: false }" class="flex min-screen">
        <aside :class="abierto ? 'translate-x-0' : '-translate-x-full md:translate-x-0'"
            class="fixed z-50 md:static w-64 h-screen bg-slate-950 text-white transform transition duration-1000">
                <div class="p-6 border-b-2 border-slate-950">
                    <h1 class="text-2xl font-bold">Biblioteca</h1>
                    <p class="text-sm text-gray-400">Bienvenido a la biblioteca</p>
                </div>
            <nav>
                <ul class="p-4 space-y-2">
                    <a href="a" class="block px-4 py-3 hover:bg-line-300"><i class="fas fa-home"></i> Inicio</a>
                    <a href="b" class="block px-4 py-3 hover:bg-line-300"><i class="fas fa-user"></i> Usuario</a>
                    <a href="c" class="block px-4 py-3 hover:bg-line-300"><i class="fas fa-book"></i> Producto</a>
                    <a href="d" class="block px-4 py-3 hover:bg-line-300"><i class="fas fa-cog"></i> configuracion</a>
                </ul>
            </nav>
        </aside>

        <div x-show="abierto" @click="abierto = false" class="fixed inset-0 bg-slate-800 z-40 md:hidden"></div>

        <main class="flex-1">
            <header class="bg-white p-4 shadow sm:p-4 flex items-center">
                <button @click="abierto = true"
                    class="bg-slate-500 px-4 py-2 text-white md:hidden">abrir</button>
                <h2 class="text-xl font-bold">Dashboard</h2>
                <h3 class="text-sm text-gray-400">when haces tus momos en laravel</h3>
            </header>
            <div class="p-4 text-cyan-900">
                xdddd but no te gusta php
            </div>
        </main>
    </div>
</x-app-layout>
<script>
window.addEventListener('load', () => {
    Swal.fire({
        title: 'papu',
        text: 'sweetalert2 funca',
        icon: 'success',
        confirmButtonText: 'aceptar',
        timer: 3000,
    });
});
</script>
