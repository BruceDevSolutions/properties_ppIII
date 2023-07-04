<x-app-layout>
    <h1 class="text-center font-semibold text-2xl my-8">Editar categoría</h1>

    <div class="max-w-lg mx-auto my-8">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="post" autocomplete="off">
            @csrf
            @method('put')

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <input 
                name="name"
                type="text"
                value="{{ @old('name', $category->name) }}"
                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 mb-4" 
                placeholder="Inserta un nombre">


            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            <textarea 
                name="description"
                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 " 
                rows="3" 
                placeholder="This is a textarea placeholder">{{ @old('description', $category->description) }}</textarea>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-sm text-gray-100 hover:text-white px-4 py-2 rounded mt-8">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
