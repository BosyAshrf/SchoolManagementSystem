<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{

	public function up()
	{
		Schema::table('Classrooms', function (Blueprint $table) {
			$table->foreign('Grade_id')->references('id')->on('Grades')->onDelete('cascade')->onUpdate('cascade');		
		});

		Schema::table('Sections', function (Blueprint $table) {
			$table->foreign('Grade_id')->references('id')->on('Grades')->onDelete('cascade')->onUpdate('cascade');		
		});


		Schema::table('my__parents', function (Blueprint $table) {
			$table->foreign('Nationality_Father_id')->references('id')->on('nationalities')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('Blood_Type_Father_id')->references('id')->on('type__bloods')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('Religion_Father_id')->references('id')->on('religions')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('Nationality_Mother_id')->references('id')->on('nationalities')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('Blood_Type_Mother_id')->references('id')->on('type__bloods')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('Religion_Mother_id')->references('id')->on('religions')->onDelete('cascade')->onUpdate('cascade');
		});

		Schema::table('parent_attachements', function (Blueprint $table) {
			$table->foreign('Parent_id')->references('id')->on('my__parents')
			->onDelete('cascade')->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('Classrooms', function (Blueprint $table) {
			$table->dropForeign('Classrooms_Grade_id_foreign');
		});
		Schema::table('Sections', function (Blueprint $table) {
			$table->dropForeign('Sections_Grade_id_foreign');
		});
		Schema::table('Sections', function (Blueprint $table) {
			$table->dropForeign('Sections_Class_id_foreign');
		});
	}
}
