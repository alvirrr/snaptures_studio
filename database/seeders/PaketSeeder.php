<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paket;

class PaketSeeder extends Seeder
{
    public function run(): void
    {
        Paket::create([
            'nama' => 'Paket 1',
            'kategori' => 'self photo',
            'harga' => 60000,
            'deskripsi' => [
                '15 Menit Sesi Foto',
                'Jumlah Foto Bebas',
                '1 Background',
                'Free 2 Cetak Foto',
                'Free Properti',
            ],
            'gambar' => 'img/s6.jpg',
        ]);

        Paket::create([
            'nama' => 'Paket 2',
            'kategori' => 'self photo',
            'harga' => 100000,
            'deskripsi' => [
                '25 Menit Sesi Foto',
                'Jumlah Foto Bebas',
                '2 Background',
                'Free 2 Cetak Foto',
                'Free Properti',
            ],
            'gambar' => 'img/s6.jpg',
        ]);

        Paket::create([
            'nama' => 'Paket 3',
            'kategori' => 'self photo',
            'harga' => 180000,
            'deskripsi' => [
                '45 Menit Sesi Foto',
                'Jumlah Foto Bebas',
                '2 Background',
                'Free 2 Cetak Foto',
                'Free Properti',
            ],
            'gambar' => 'img/s6.jpg',
        ]);

        // Foto Studio
        Paket::create([
            'nama' => 'Package 1',
            'kategori' => 'photo studio',
            'harga' => 200000,
            'deskripsi' => [
                '15 File Edit',
                '1 Background',
                'All File Diterima',
                'File On Google Drive',
            ],
            'gambar' => 'img/pstudio2.jpg',
        ]);
        Paket::create([
            'nama' => 'Package 2',
            'kategori' => 'photo studio',
            'harga' => 300000,
            'deskripsi' => [
                '20 File Edit',
                '2 Background',
                'All File Diterima',
                'File On Google Drive',
            ],
            'gambar' => 'img/pstudio2.jpg',
        ]);

        Paket::create([
            'nama' => 'Package 3',
            'kategori' => 'photo studio',
            'harga' => 500000,
            'deskripsi' => [
                '25 File Edit',
                '2 Background',
                '1 Cetak 12RS + Frame',
                'All File Diterima',
                'File On Google Drive',
            ],
            'gambar' => 'img/pstudio2.jpg',
        ]);
        // Pas Photo
        Paket::create([
            'nama' => 'Pas Photo',
            'kategori' => 'pas photo',
            'harga' => 20000,
            'deskripsi' => [
                '1 orang',
                'File Foto 4x6, 3x4, 2x3',
                'File Edit',
                'File On Google Drive',
            ],
            'gambar' => 'img/pas2.jpg',
        ]);

        Paket::create([
            'nama' => 'Full Body',
            'kategori' => 'pas photo',
            'harga' => 25000,
            'deskripsi' => [
                '1 orang',
                'File Foto 4R',
                'File Edit',
                'File On Google Drive',
            ],
            'gambar' => 'img/pas1.jpg',
        ]);
    }
}
