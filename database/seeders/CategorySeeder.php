<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $casa = new Category();
        $casa->name = 'Casa';
        $casa->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eaque voluptatibus nostrum fuga pariatur doloribus ducimus maxime expedita, quaerat, ab eos quo non error molestiae. Dignissimos distinctio deleniti repudiandae quae.';
        $casa->save();

        $departamento = new Category();
        $departamento->name = 'Departamento';
        $departamento->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eaque voluptatibus nostrum fuga pariatur doloribus ducimus maxime expedita, quaerat, ab eos quo non error molestiae. Dignissimos distinctio deleniti repudiandae quae.';
        $departamento->save();

        $AirBnb = new Category();
        $AirBnb->name = 'AirBnb';
        $AirBnb->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt eaque voluptatibus nostrum fuga pariatur doloribus ducimus maxime expedita, quaerat, ab eos quo non error molestiae. Dignissimos distinctio deleniti repudiandae quae.';
        $AirBnb->save();
    }
}
