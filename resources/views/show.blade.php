<x-public-layout :categories="$categories">
    <h1 class="text-2xl font-bold text-gray-800 mt-8">
        {{ $property->title }}
    </h1>

    <div class="space-x-2 mt-2 mb-8">
        @foreach ($property->tags as $tag)
            <a href="{{ route('tags.show', $tag->id) }}">
                <span class="bg-blue-500 rounded-lg border-gray-300 px-4 py-1 text-gray-100 text-sm">
                    {{ $tag->tag }}
                </span>
            </a>
        @endforeach
    </div>
    
    <div class="grid grid-cols-4 gap-2">
        @foreach ($property->images as $image)
            @if($loop->first)
                <div class="col-span-4">
                    <img src="{{ $image->path }}">                
                </div>
            @else
                <div class="col-span-1">
                    <img src="{{ $image->path }}">                
                </div>
            @endif
        @endforeach
    </div>

    <h2 class="font-bold my-2 text-2xl">Descripción:</h2>
    <p>
        {{ $property->description }}
    </p>
</x-public-layout>