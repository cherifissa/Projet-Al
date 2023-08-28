<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChambreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chambres')->delete();


        DB::table('chambres')->insert(
            [
                [
                    'id' => 100,
                    'status' => 'libre',
                    'categorie_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 101,
                    'status' => 'libre',
                    'categorie_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ], [
                    'id' => 102,
                    'status' => 'libre',
                    'categorie_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ], [
                    'id' => 103,
                    'status' => 'libre',
                    'categorie_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 104,
                    'status' => 'libre',
                    'categorie_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 105,
                    'status' => 'libre',
                    'categorie_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 106,
                    'status' => 'libre',
                    'categorie_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 107,
                    'status' => 'libre',
                    'categorie_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 108,
                    'status' => 'libre',
                    'categorie_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 109,
                    'status' => 'libre',
                    'categorie_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 110,
                    'status' => 'libre',
                    'categorie_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 111,
                    'status' => 'libre',
                    'categorie_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 112,
                    'status' => 'libre',
                    'categorie_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 113,
                    'status' => 'libre',
                    'categorie_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 114,
                    'status' => 'libre',
                    'categorie_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 115,
                    'status' => 'libre',
                    'categorie_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 116,
                    'status' => 'libre',
                    'categorie_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 117,
                    'status' => 'libre',
                    'categorie_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

            ]
        );
    }
}
