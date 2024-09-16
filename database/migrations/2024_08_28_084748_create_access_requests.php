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
        Schema::create('access_requests', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('article_id')->nullable();
            $table->foreignUuid('user_id')->nullable();
            $table->string('staff_name')->nullable();
            $table->text('reason')->nullable();
            $table->integer('duration')->nullable();
            $table->dateTime('expiry')->nullable();
            $table->string('access_granted')->default('pending');
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
        Schema::dropIfExists('access_requests');
    }
};
