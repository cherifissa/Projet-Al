<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChambreCategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chambre_categories')->delete();


        DB::table('chambre_categories')->insert(
            [
                [
                    'id' => 1,
                    'nom' => 'standard',
                    'prix' => 40000,
                    'wifi' => 1,
                    'petit_dej' => 0,
                    'nbr_chb' => 1,
                    'nbr_lit' => 1,
                    'description' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 2,
                    'nom' => 'privilege',
                    'prix' => 55000,
                    'wifi' => 1,
                    'petit_dej' => 1,
                    'nbr_chb' => 1,
                    'nbr_lit' => 1,
                    'description' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 3,
                    'nom' => 'suite junior',
                    'prix' => 80000,
                    'wifi' => 1,
                    'petit_dej' => 1,
                    'nbr_chb' => 2,
                    'nbr_lit' => 3,
                    'description' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 4,
                    'nom' => 'suite famille',
                    'prix' => 100000,
                    'wifi' => 1,
                    'petit_dej' => 1,
                    'nbr_chb' => 3,
                    'nbr_lit' => 3,
                    'description' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 5,
                    'nom' => 'suite VIP',
                    'prix' => 120000,
                    'wifi' => 1,
                    'petit_dej' => 1,
                    'nbr_chb' => 3,
                    'nbr_lit' => 4,
                    'description' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 6,
                    'nom' => 'suite presidentielle',
                    'prix' => 180000,
                    'wifi' => 1,
                    'petit_dej' => 1,
                    'nbr_chb' => 4,
                    'nbr_lit' => 6,
                    'description' => '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
