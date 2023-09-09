<?php

namespace Modules\Réservation\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Réservation\Entities\DemandeReservation;

class ReservationRefusedMail extends Mailable
{
    use SerializesModels;

    public $nom_client;
    public $id;
    public $date_arrive;
    public $date_depart;
    public $type_chambre;
    public $nombre_adulte;
    public $nombre_enfant;
    public $email_client;

    public function __construct(DemandeReservation $demandeReservation)
    {
        $this->nom_client = $demandeReservation->nom_client;
        $this->id = $demandeReservation->id;
        $this->date_arrive = $demandeReservation->date_arrive;
        $this->date_depart = $demandeReservation->date_depart;
        $this->type_chambre = $demandeReservation->type_chambre;
        $this->nombre_adulte = $demandeReservation->nombre_adulte;
        $this->nombre_enfant = $demandeReservation->nombre_enfant;
        $this->email_client = $demandeReservation->email_client;
    }

    public function build()
    {
        return $this->view('réservation::email.email_refused')
            ->subject('Réservation Refusée');
    }
}
