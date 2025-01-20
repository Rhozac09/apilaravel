<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            Pelanggan::create([
                'nama' => $faker->name,
                'alamat' => $faker->sentence,
                'kode' => $faker->sentence,
                'no_telp' => $faker->sentence,
                'paket' => $faker->sentence,
                'tanggal_pendaftaran' => $faker->date,

            ]);
    }
}
}