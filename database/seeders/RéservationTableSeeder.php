<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Réservation\Entities\Chambre;
use Modules\Réservation\Entities\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RéservationTableSeeder extends Seeder
{
    public function run()
    {
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
