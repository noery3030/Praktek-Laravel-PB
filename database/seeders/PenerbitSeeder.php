<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenerbitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i <10; $i++){
        DB::table('penerbit')->insert(
            [
                'nama' => uniqid('nama_'),
                'alamat' => uniqid('alamat_'),
                'email' => uniqid('@gmail,com'),
                'website' => uniqid('www.').'com',
                'telepon' => '021-'.rand(),
                'cp' => uniqid('cp_')
            ]);
        }
    }
}
