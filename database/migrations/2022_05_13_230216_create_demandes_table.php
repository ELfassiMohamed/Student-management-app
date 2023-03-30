<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('etat')->nullable();
            $table->string('etat_prop')->nullable();
            $table->string('message')->nullable();
            $table->string('titre_demande')->nullable();
            $table->string('etudiant')->nullable();
            $table->string('apoge')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('demandes');
    }
}
