<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\KategoriBerita::create([
            'nama' => 'Politik',
        ]);

        \App\Models\KategoriBerita::create([
            'nama' => 'Olahraga',
        ]);

        \App\Models\KategoriBerita::create([
            'nama' => 'Ekonomi',
        ]);

        \App\Models\KategoriBerita::create([
            'nama' => 'Kesehatan',
        ]);

        \App\Models\KategoriBerita::create([
            'nama' => 'Teknologi',
        ]);
    }
}
