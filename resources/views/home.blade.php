<x-public-layout :categories="$categories">
        <h1 class="text-2xl font-bold text-center mb-4">
            Propiedades
        </h1>

        <Div class="grid grid-cols-3 gap-4 rounded-lg ">
            @foreach ($properties as $property)
                <a href="{{ route('properties.show', $property->id) }}">
                    <x-card>

                        @isset($property->images[0]) 
                            <img class="rounded-lg mb-2" src="{{ $property->images[0]->path }}" alt="">
                            
                        {{-- Si existe haces esto --}}
                        @else
                            <img class="rounded-lg mb-2" src="https://definicion.de/wp-content/uploads/2011/01/casa-2.jpg" alt="">
                            
                        {{-- Si no existe haces esto --}}
                        @endisset()
    
                        <h2 class="font-semibold text-xl text-gray-800 text-center">{{ $property->title }}</h2>
                        
                        <p class="mt-4">
                            {{ Str::limit($property->description, 120)  }}
                        </p>
    
                        <div class="mt-4">
                            <p>
                                <span class="font-semibold">
                                    Zona:
                                </span>
                                {{ $property->zone->name }}</p>
                        </div>
    
                        <div class="mt-2">
                            <p>
                                <span class="font-semibold">
                                    Modalidad:
                                </span>
                                @isset($property->mode) 
                                <img class="rounded-lg mb-2" src="{{ $property->images[0]->path }}" alt="">
                                    {{ $property->mode->mode }}
                                    
                                {{-- Si existe haces esto --}}
                                @else
                                    -
                                {{-- Si no existe haces esto --}}
                                @endisset()
                            </p>
                        </div>
                    </x-card>
                </a>
            @endforeach
        </Div>
    
        <div class="mt-8">
            {{ $properties->links() }}
        </div>
</x-public-layout>