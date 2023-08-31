<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            // Insert your data here
            // Example:
            [
                'id' => 1,
                'nom' => 'Stacy Flatley Sr.',
                'tel' => '(971) 985-4622',
                'email' => 'admin@gmail.com',
                'type_piece' => 'carte consulaire',
                'numero_piece' => 'UA6122312',
                'adresse' => '6336 Kilback Freeway Apt. 851\nLake Ginaton, WV 51906',
                'isadmin' => 'barman',
                'password' => '$2y$10$PG.d92YYlhGNjIZ5Lvj9VOs8Gu5ZsDUvgRSspdDOqZZalqMtNFcba', // Hashed password
                'remember_token' => 'IBqZSvywbm',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nom' => 'Dr. Miles Schoen MD',
                'tel' => '(681) 328-1489',
                'email' => 'reception@gmail.com',
                'type_piece' => 'cni',
                'numero_piece' => 'PO6062088',
                'adresse' => '410 Bauch Rue\nRonnyfort, OH 64207-4732',
                'isadmin' => 'recept',
                'password' => '$2y$10$5ak.FK1.YTEE4yqgiOxyGuvfR80i1qLkKyuAp0YHK2D.98y69HjRu', // Hashed password
                'remember_token' => 'ZjjXTe1Uv1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nom' => 'Jhon Schoen MD',
                'tel' => '09 328-1489',
                'email' => 'restaurant@gmail.com',
                'type_piece' => 'cni',
                'numero_piece' => 'OM604088',
                'adresse' => '410 Bauch Rue\nRonnyfort, OH 64207-4732',
                'isadmin' => 'server',
                'password' => '$2y$10$5ak.FK1.YTEE4yqgiOxyGuvfR80i1qLkKyuAp0YHK2D.98y69HjRu', // Hashed password
                'remember_token' => 'ZjjXTe1Uv1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nom' => 'Mahamat cherif',
                'tel' => '09 328-1489',
                'email' => 'mcherif@gmail.com',
                'type_piece' => 'passeport',
                'numero_piece' => 'KL904488',
                'adresse' => '410 Bauch Rue\nRonnyfort, OH 64207-4732',
                'isadmin' => 'client',
                'password' => '$2y$10$5ak.FK1.YTEE4yqgiOxyGuvfR80i1qLkKyuAp0YHK2D.98y69HjRu', // Hashed password
                'remember_token' => 'ZjjXTe1Uv1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
