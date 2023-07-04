<x-app-layout>

    <div class="">
        <h1 class="text-center font-semibold text-2xl">Propiedades</h1>

        <div class="flex justify-end mb-8">
            <a href="{{ route('admin.properties.create') }}">
                <button class="bg-blue-500 text-sm text-gray-100 hover:text-white px-4 py-2 rounded">
                    Crear
                </button>
            </a>
        </div>

        {{-- Tabla --}}
        
    </div>
</x-app-layout>