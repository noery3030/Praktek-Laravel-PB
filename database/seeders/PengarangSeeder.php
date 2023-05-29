<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Pengarang')-> insert(
            [
                [
                    'nama' => 'Deden Hamdani','email' => 'deden@gmail.com', 'hp' => '0857123456', 'foto'=>''
                ],
                [
                    'nama' => 'Dedi Iskandar','email' => 'dedi@gmail.com', 'hp' => '0857789456', 'foto'=>''
                ],
                [ 
                    'nama' => 'Siti Aminah','email' => 'siti@gmail.com', 'hp' => '0813789456', 'foto'=>''
                ]   
                ]);
    }
}
