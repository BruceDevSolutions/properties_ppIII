<?php

namespace Database\Seeders;

use App\Models\Mode;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alquiler = new Mode();
        $alquiler->mode = 'Alquiler';
        $alquiler->save();

        $alquiler = new Mode();
        $alquiler->mode = 'Anticrético';
        $alquiler->save();

        $alquiler = new Mode();
        $alquiler->mode = 'Venta';
        $alquiler->save();
    }
}
