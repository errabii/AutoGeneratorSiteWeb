<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateconfigsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('protocole');
            $table->integer('domaine_id')->unsigned();    
            $table->foreign('domaine_id')->references('id')->on('domaines');
            $table->string('nom_site');
            $table->string('description_site');
            $table->string('nom_admin');
            $table->string('password');
            $table->string('email');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('configs');
        
    
    }
}
