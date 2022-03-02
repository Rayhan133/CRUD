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
        Schema::create('file_group_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_info_has_group_id')->constrained('file_info_has_groups')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('number', 16, 0);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('state');
            $table->string('zip');
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
        Schema::dropIfExists('file_group_infos');
    }
};
