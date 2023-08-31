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
    }
}
