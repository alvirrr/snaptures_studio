<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Paket;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Paket::create([
            'nama' => 'Paket Foto',
            'kategori' => 'Pas Photo',
            'harga' => 20000,
            'deskripsi' => json_encode(['1 Orang', 'File 3x4', 'File 4x6', 'File 2x3', 'File Edit']),
            'gambar' => 'img/foto1.jpg',
        ]);

        Paket::create([
            'nama' => 'Paket Cetak',
            'kategori' => 'Pas Photo',
            'harga' => 5000,
            'deskripsi' => json_encode([
                'Pilih Ukuran 4x6',
                '4 Lembar Foto Cetak',
                'Pilih Ukuran 3x4',
                '8 Lembar Foto Cetak',
                'Pilih Ukuran 2x3',
                '8 Lembar Foto Cetak'
            ]),
            'gambar' => 'img/foto1.jpg',
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
