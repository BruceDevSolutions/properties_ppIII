<x-app-layout>
    <div class="">
        <h1 class="text-center font-semibold text-2xl">Registrar propiedad</h1>

        <div class="max-w-lg mx-auto my-8">
            <form action="{{ route('admin.properties.update', $property->id) }}" method="post" autocomplete="off">
                @csrf
                @method('put')

                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                <input 
                    name="title"
                    type="text"
                    value="{{ @old('title', $property->title) }}"
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 mb-4" 
                    placeholder="Inserta un titulo">


                <x-input-error :messages="$errors->get('description')" class="mt-2" />
               
                    <textarea 
                    name="description"
                    class="py-3 px-4 mb-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 " 
                    rows="3" 
                    placeholder="This is a textarea placeholder">{{ @old('description', $property->description) }}</textarea>

                <x-input-error :messages="$errors->get('price')" class="mt-2" />
               
                    <input 
                    type='number'
                    name="price"
                    type="text"
                    value="{{ @old('price', $property->price) }}"
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 mb-4" 
                    placeholder="Inserta un precio">

                <select 
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 mb-4" 
                    name="category_id">
                    <option selected disabled>--Seleeciona una opcion--</option>

                    @foreach ($categories as $category)
                        <option {{ $property->category_id === $category->id ? 'selected' : ' ' }} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <select 
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 mb-4" 
                    name="zone_id">
                    <option selected value=null>--Seleeciona una opcion--</option>

                    @foreach ($zones as $zone)
                        <option {{ $property->zone_id === $zone->id ? 'selected' : ' ' }} value="{{ $zone->id }}">{{ $zone->name }}</option>
                    @endforeach
                </select>

                <hr>

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    
                <input 
                    name="name"
                    type="text"
                    value="{{ @old('name', $property->owner[0]->name) }}"
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 mb-4" 
                    placeholder="Inserta un nombre de duenio">


                {{-- Para la solucion alternativa, creamos un input oculto (class hidden) que almacena el ID del propietario. Este ID se recibe en el controlador para actualizar el registro --}}
                <input 
                    class="hidden"
                    name="owner_id"
                    type="text"
                    value="{{ @old('name', $property->owner[0]->id) }}"
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 mb-4" 
                    placeholder="Inserta un nombre de duenio">
    
                <select 
                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 mb-4" 
                    name="status">
                    <option {{ $property->status === 'draft' ? 'selected' : null }} value='1'>Borrador</option>
                    <option {{ $property->status === 'hidden' ? 'selected' : null }} value='2'>Oculto</option>
                    <option {{ $property->status === 'visible'? 'selected' : null }} value='3'>Visible</option>
                </select>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-sm text-gray-100 hover:text-white px-4 py-2 rounded mt-8">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>