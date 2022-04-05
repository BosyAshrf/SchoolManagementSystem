<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Table_Section', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Teacher_id');
            $table->foreign('Teacher_id')->references('id')->on('teachers')->onDelete('cascade');

            $table->unsignedBigInteger('Section_id');
            $table->foreign('Section_id')->references('id')->on('Sections')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Table_Section');
    }
}
