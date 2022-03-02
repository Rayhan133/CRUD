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
        Schema::create('file_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file_name');
            $table->integer('total_upload')->default(0);
            $table->integer('total_process')->default(0);
            $table->integer('group')->default(0);
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
        Schema::dropIfExists('file_infos');
    }
};
