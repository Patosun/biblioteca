<x-app-layout>
    <div x-data="{ abierto: false }" class="flex min-screen">
        <aside :class="abierto ? 'translate-x-0' : 'translate-x-full'"
            class="fixed md:static w-64 h-screen bg-slate-950 text-white transform md:translate-x-0 transition duration-1000">
                <div class="p-6 border-b-2 border-slate-950">
                    <h1 class="text-2xl font-bold">Biblioteca</h1>
                    <p class="text-sm text-gray-400">Bienvenido a la biblioteca</p>
                </div>
            <nav>
                <ul class="p-4 space-y-2">
                    <a href="a" class="block px-4 py-3 hover:bg-line-300">Inicio</a>
                    <a href="b" class="block px-4 py-3 hover:bg-line-300">Usuario</a>
                    <a href="c" class="block px-4 py-3 hover:bg-line-300">Producto</a>
                    <a href="d" class="block px-4 py-3 hover:bg-line-300">configuracion</a>
                </ul>
            </nav>
        </aside>

        <div x-show="abierto" @click="abierto = false" class="fixed inset-0 bg-slate-800 z-40 md:hidden"></div>

        <main class="flex-1">
            <header>
                <button @click="abierto = true"
                    class="fixed left-4 top-28 z-50 block bg-slate-500 px-4 py-2 text-white">abrir</button>

            </header>
        </main>
    </div>
</x-app-layout>
