<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Réservation\Entities\Chambre;
use Modules\Réservation\Entities\Reservation;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
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
                    'description' => "Bienvenue à notre élégante chambre d'hôtel, un havre de confort et de tranquillité. Cette chambre spacieuse offre une vue panoramique sur la ville depuis son balcon privé. Décorée avec goût, elle est dotée d'un lit king-size luxueux et d'un coin salon propice à la détente. La salle de bains en marbre est équipée d'une douche à effet pluie et d'articles de toilette haut de gamme. Profitez des équipements modernes tels qu'une télévision à écran plat, un minibar bien approvisionné et un accès Wi-Fi gratuit. Notre chambre incarne le mariage parfait entre confort contemporain et esthétique raffinée, créant ainsi un espace accueillant pour votre séjour mémorable.",
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
                    'description' => "Bienvenue à notre élégante chambre d'hôtel, un havre de confort et de tranquillité. Cette chambre spacieuse offre une vue panoramique sur la ville depuis son balcon privé. Décorée avec goût, elle est dotée d'un lit king-size luxueux et d'un coin salon propice à la détente. La salle de bains en marbre est équipée d'une douche à effet pluie et d'articles de toilette haut de gamme. Profitez des équipements modernes tels qu'une télévision à écran plat, un minibar bien approvisionné et un accès Wi-Fi gratuit. Notre chambre incarne le mariage parfait entre confort contemporain et esthétique raffinée, créant ainsi un espace accueillant pour votre séjour mémorable.",
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
                    'description' => "Bienvenue à notre élégante chambre d'hôtel, un havre de confort et de tranquillité. Cette chambre spacieuse offre une vue panoramique sur la ville depuis son balcon privé. Décorée avec goût, elle est dotée d'un lit king-size luxueux et d'un coin salon propice à la détente. La salle de bains en marbre est équipée d'une douche à effet pluie et d'articles de toilette haut de gamme. Profitez des équipements modernes tels qu'une télévision à écran plat, un minibar bien approvisionné et un accès Wi-Fi gratuit. Notre chambre incarne le mariage parfait entre confort contemporain et esthétique raffinée, créant ainsi un espace accueillant pour votre séjour mémorable.",
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
                    'description' => "Bienvenue à notre élégante chambre d'hôtel, un havre de confort et de tranquillité. Cette chambre spacieuse offre une vue panoramique sur la ville depuis son balcon privé. Décorée avec goût, elle est dotée d'un lit king-size luxueux et d'un coin salon propice à la détente. La salle de bains en marbre est équipée d'une douche à effet pluie et d'articles de toilette haut de gamme. Profitez des équipements modernes tels qu'une télévision à écran plat, un minibar bien approvisionné et un accès Wi-Fi gratuit. Notre chambre incarne le mariage parfait entre confort contemporain et esthétique raffinée, créant ainsi un espace accueillant pour votre séjour mémorable.",
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
                    'description' => "Bienvenue à notre élégante chambre d'hôtel, un havre de confort et de tranquillité. Cette chambre spacieuse offre une vue panoramique sur la ville depuis son balcon privé. Décorée avec goût, elle est dotée d'un lit king-size luxueux et d'un coin salon propice à la détente. La salle de bains en marbre est équipée d'une douche à effet pluie et d'articles de toilette haut de gamme. Profitez des équipements modernes tels qu'une télévision à écran plat, un minibar bien approvisionné et un accès Wi-Fi gratuit. Notre chambre incarne le mariage parfait entre confort contemporain et esthétique raffinée, créant ainsi un espace accueillant pour votre séjour mémorable.",
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
                    'description' => "Bienvenue à notre élégante chambre d'hôtel, un havre de confort et de tranquillité. Cette chambre spacieuse offre une vue panoramique sur la ville depuis son balcon privé. Décorée avec goût, elle est dotée d'un lit king-size luxueux et d'un coin salon propice à la détente. La salle de bains en marbre est équipée d'une douche à effet pluie et d'articles de toilette haut de gamme. Profitez des équipements modernes tels qu'une télévision à écran plat, un minibar bien approvisionné et un accès Wi-Fi gratuit. Notre chambre incarne le mariage parfait entre confort contemporain et esthétique raffinée, créant ainsi un espace accueillant pour votre séjour mémorable.",
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
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
        DB::table('users')->delete();
        DB::table('users')->insert([
            [
                'id' => 1,
                'nom' => 'Stacy Flatley Sr.',
                'tel' => '(971) 985-4622',
                'email' => 'barman@gmail.com',
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
        $clients = User::all();
        $chambres = Chambre::all();
        $start = Carbon::now()->format('Y-m-d');
        $end = Carbon::now()->addDays(10)->format('Y-m-d');
        foreach (range(1, 10) as $index) {
            $randomDate = Carbon::createFromFormat('Y-m-d', $start)
                ->addDays(random_int(0, Carbon::createFromFormat('Y-m-d', $end)->diffInDays($start)))
                ->format('Y-m-d');

            $dateArrive = $randomDate;
            $dateDepart = Carbon::createFromFormat('Y-m-d', $randomDate)
                ->addDays(random_int(1, 14))
                ->format('Y-m-d');
            $randomChambre = $chambres->random();
            $randomChambreCategorie = $randomChambre->chambreCategorie;
            $nbrJour = Carbon::parse($dateArrive)->diffInDays(Carbon::parse($dateDepart));
            $prix = $randomChambreCategorie->prix * $nbrJour;

            // dd($nbrJour, $randomChambreCategorie,  $prix);
            Reservation::create([
                'numero' => 'RSV' . random_int(19111111, 9999999999),
                'nbr_jour' => $nbrJour,
                'nbr_client' => random_int(1, 2),
                'prix' => $prix,
                'status' => 'attente',
                'date_arrive' => $dateArrive,
                'date_depart' => $dateDepart,
                'client_id' => $clients->random()->id,
                'chambre_id' => $randomChambre->id,
            ]);
        }
    }
}
