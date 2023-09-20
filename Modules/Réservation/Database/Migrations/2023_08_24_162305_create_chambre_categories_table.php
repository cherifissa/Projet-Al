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
        Schema::create('chambre_categories', function (Blueprint $table) {
            $table->id();
            $table->enum('nom', ['standard', 'privilege', 'suite junior', 'suite famille', 'suite VIP', 'suite presidentielle', 'salle']);
            $table->integer('prix')->unsigned();
            $table->boolean('wifi')->nullable()->default(true);
            $table->boolean('petit_dej')->nullable()->default(true);
            $table->integer('nbr_chb');
            $table->integer('nbr_lit');
            $table->text('description', 100)->nullable(true);
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
        Schema::dropIfExists('chambre_categories');
    }
};
