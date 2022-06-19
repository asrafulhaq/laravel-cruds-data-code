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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email') -> unique();
            $table->string('cell') -> unique();;
            $table->string('username') -> unique();
            $table->string('education');
            $table->string('photo') -> nullable();
            $table->integer('age');
            $table->string('gender');
            $table->string('courses') -> default('[]');  
            $table->boolean('status') -> default(true);
            $table->boolean('trash') -> default(false);
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
        Schema::dropIfExists('students');
    }
};
