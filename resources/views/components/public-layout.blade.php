<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="py-2 bg-blue-500">
        <div class="max-w-3xl mx-auto text-center">
            <nav class="space-x-4">
                <a class="text-gray-200 hover:text-white font-semibold" href="{{ route('properties.index') }}">Inicio</a>
                
                @foreach ($categories as $category)
                    <a class="text-gray-200 hover:text-white font-semibold" href="{{ route('categories.show', $category->id) }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </nav>
        </div>
    </div>

    <div class="max-w-3xl mx-auto">
        {{ $slot }} 
    </div>
</body>
</html>