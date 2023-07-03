<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Property;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = Property::factory(200)->create();

        foreach($properties as $property) {
            // Me va a relacionar cada propiedad con una o más etiquetas.
            $property->tags()->attach([
                Tag::all()->random()->id, 
                Tag::all()->random()->id, 
                Tag::all()->random()->id
            ]);

            // Cada propiedad se relaciona con cuatro comentarios
            Comment::factory(4)->create([
                'property_id' => $property->id,
            ]);

            $image = new Image();
            $image->path = 'https://definicion.de/wp-content/uploads/2011/01/casa-2.jpg';
            $image->property_id = $property->id;
            $image->save();

            $image = new Image();
            $image->path = 'https://i.blogs.es/c68014/casa-3d/840_560.jpeg';
            $image->property_id = $property->id;
            $image->save();

            $image = new Image();
            $image->path = 'https://i.blogs.es/c68014/casa-3d/840_560.jpeg';
            $image->property_id = $property->id;
            $image->save();
        }
    }
}
