<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiant_matiere', function (Blueprint $table) {
            $table->id();
            $table->double('note');
            $table->double('examen');
            $table->foreignId('etudiant_id')->constrained();
            $table->foreignId('matiere_id')->constrained();
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
        Schema::dropIfExists('etdiant_matiere');
    }
};
