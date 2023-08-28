<?php

namespace Modules\Réservation\Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Modules\Réservation\Entities\Chambre;
use Modules\Réservation\Entities\Reservation;

class RéservationDatabaseSeeder extends Seeder
{
    public function run()
    {
        // Assuming you have at least two clients and chambres in your database
        $clients = User::all();
        $chambres = Chambre::all();
        $start = '2023-08-27';
        $end = '2023-09-15';
        $randomDate = Carbon::createFromFormat('Y-m-d', $start)
            ->addDays(random_int(0, Carbon::createFromFormat('Y-m-d', $end)->diffInDays($start)))
            ->format('Y-m-d');


        // Create sample reservations
        foreach (range(1, 10) as $index) {
            Reservation::create([
                'numero' => 'RSV' . random_int(19111111, 9999999999),
                'nbr_jour' => random_int(1, 7),
                'nbr_client' => random_int(1, 4),
                'prix' => 100 * $index,
                'status' => 'enregistre',
                'date_arrive' => $randomDate,
                'date_depart' => Carbon::createFromFormat('Y-m-d', $randomDate)->addDays(random_int(1, 14))->format('Y-m-d'),
                'client_id' => $clients->random()->id,
                'chambre_id' => $chambres->random()->id,
            ]);
        }
    }
}