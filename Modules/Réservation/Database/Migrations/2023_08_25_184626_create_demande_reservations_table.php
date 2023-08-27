<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('nom_client', 100);
            $table->string('email_client', 75);
            $table->date('date_arrive');
            $table->date('date_depart');
            $table->enum('type_chambre', ['standard', 'privilege', 'suite junior', 'suite famille', 'suite VIP', 'suite presidentielle']);
            $table->integer('nombre_adulte');
            $table->integer('nombre_enfant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demande_reservations');
    }
};
