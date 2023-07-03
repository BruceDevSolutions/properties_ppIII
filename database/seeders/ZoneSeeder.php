<?php

namespace Database\Seeders;

use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sopocachi = new Zone();
        $sopocachi->name = 'Sopocachi';
        $sopocachi->save();

        $Cala_coto = new Zone();
        $Cala_coto->name = 'Cala coto';
        $Cala_coto->save();

        $Achumani = new Zone();
        $Achumani->name = 'Achumani';
        $Achumani->save();

        $Irpavi = new Zone();
        $Irpavi->name = 'Irpavi';
        $Irpavi->save();
    }
}
