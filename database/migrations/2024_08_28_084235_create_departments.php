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
        Schema::create('departments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title')->nullable();
            $table->timestamps();
        });

        Schema::table('users', function(Blueprint $table){
           $table->foreignUuid('department_id')->nullable();

        });

        Schema::table('articles', function(Blueprint $table){
            $table->foreignUuid('department_id')->nullable();
             $table->boolean('classified')->default(false);
         }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
};
