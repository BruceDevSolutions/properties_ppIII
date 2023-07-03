<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Property;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Tag::factory(15)->create();

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ModeSeeder::class);
        $this->call(ZoneSeeder::class);
        $this->call(PropertySeeder::class);

       
    }
}
