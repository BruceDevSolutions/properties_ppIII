<x-public-layout :categories="$categories">
    <h1 class="text-2xl font-bold text-center mb-4">
        {{ $tag->tag }}
    </h1>

    <Div class="grid grid-cols-3 gap-4 rounded-lg  ">
        @foreach ($properties as $property)
            {{-- Enlace --}}
            <a href="{{ route('properties.show', $property->id) }}">
                {{-- Card --}}
                <x-card>
                    <img class="rounded-lg mb-2" src="{{ $property->images[0]->path }}" alt="">

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
                            {{ $property->mode->mode }}</p>
                    </div>
                </x-card>
            </a>
        @endforeach
    </Div>

    <div class="mt-8">
        {{ $properties->links() }}
    </div>
</x-public-layout>