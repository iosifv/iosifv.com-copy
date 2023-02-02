<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category')->index();
            $table->string('file_name');
            $table->string('public_path');
            $table->string('storage_path');
            $table->string('slug');
            $table->string('name')->nullable();
            $table->smallInteger('height');
            $table->smallInteger('width');
            $table->string('description')->nullable();
            $table->timestamps();

            $table->unique(['category', 'file_name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
