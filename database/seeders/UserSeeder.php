<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->name = 'Administrador';
        $admin->email = 'admin@email.com';
        $admin->password = '123456789';
        $admin->user_type = 'admin';
        $admin->save();

        $public = new User();
        $public->name = 'Public account';
        $public->email = 'public@email.com';
        $public->password = '123456789';
        $public->save();

        $creator = new User();
        $creator->name = 'Creador';
        $creator->email = 'creator@email.com';
        $creator->password = '123456789';
        $creator->user_type = 'creator';
        $creator->save();
    }
}
