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
        Schema::create('file_info_has_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_info_id')->constrained('file_infos')->onDelete('cascade')->onUpdate('cascade');
            $table->string('group_name');
            $table->integer('total')->default(0);
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
        Schema::dropIfExists('file_info_has_groups');
    }
};
