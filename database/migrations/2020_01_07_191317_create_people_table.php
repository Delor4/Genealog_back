<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
			$table->bigIncrements('id');
			
            $table->timestamps();
			
			$table->string('first_name')->default('John');
            $table->string('last_name')->default('Doe');
			$table->decimal('birth_year', 8, 0)->default(1900);
			$table->enum('sex', ['m', 'f'])->default('f');
			
			$table->unsignedBigInteger('parent_id')->nullable();
			$table->foreign('parent_id')->references('id')->on('people');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
