<?php

namespace Database\Seeders;

use App\Models\Artis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artis::create([
            'nama' => 'Andi',
        ]);

        Artis::create([
            'nama' => 'Budi',
        ]);

        Artis::create([
            'nama' => 'Caca',
        ]);

        Artis::create([
            'nama' => 'Dedi',
        ]);

        Artis::create([
            'nama' => 'Erik',
        ]);
    }
}
