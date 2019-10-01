<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('make');
            $table->string('model');
            $table->string('photo');
            $table->string('slug');
            $table->unsignedBigInteger('engine_id');
            $table->unsignedBigInteger('year_id');
            $table->unsignedBigInteger('fuel_id');
            $table->unsignedBigInteger('body_id');
            $table->unsignedBigInteger('gearbox_id');
            $table->unsignedBigInteger('wheels_id');
            $table->unsignedBigInteger('color_id');
            $table->timestamps();

            $table->foreign('engine_id')
                ->references('id')
                ->on('engine')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('year_id')
                ->references('id')
                ->on('year')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('fuel_id')
                ->references('id')
                ->on('fuel')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('body_id')
                ->references('id')
                ->on('body')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('gearbox_id')
                ->references('id')
                ->on('gearbox')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('wheels_id')
                ->references('id')
                ->on('wheels')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('color_id')
                ->references('id')
                ->on('color')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autos');
    }
}
