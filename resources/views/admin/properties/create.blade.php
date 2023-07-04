<x-app-layout>
    <div class="">
        <h1 class="text-center font-semibold text-2xl">Registrar propiedad</h1>

        <div class="max-w-lg mx-auto my-8">
            <form action="{{ route('admin.properties.store') }}" method="post" autocomplete="off">
                @csrf

                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                <input 
                    name="title"
                    type="text"
                    value="{{ @old('title') }}"
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 mb-4" 
                    placeholder="Inserta un titulo">


                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                <textarea 
                    name="description"
                    class="py-3 px-4 mb-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 " 
                    rows="3" 
                    placeholder="This is a textarea placeholder">{{ @old('description') }}</textarea>

                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                <input 
                    type='number'
                    name="price"
                    type="text"
                    value="{{ @old('price') }}"
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 mb-4" 
                    placeholder="Inserta un precio">

                <select 
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 mb-4" 
                    name="category_id">
                    <option selected disabled>--Seleeciona una opcion--</option>
                    <option value="1">Casa</option>
                    <option value="2" selected>Departamento</option>
                    <option value="3">AirBNB</option>
                </select>

                <select 
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 mb-4" 
                    name="zone_id">
                    <option selected value=null>--Seleeciona una opcion--</option>
                    <option value="1">Sopocachi</option>
                    <option value="2" selected>Calacoto</option>
                </select>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-sm text-gray-100 hover:text-white px-4 py-2 rounded mt-8">
                        Crear
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>