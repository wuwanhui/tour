<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('menus')) {
            Schema::drop('menus');
        } else {
            Schema::create('menus', function (Blueprint $table) {
                $table->uuid('id');
                $table->string('Name');
                $table->string('Model');
                $table->string('Page');
                $table->string('Url');
                $table->integer('ParentId');
                $table->string('Open');
                $table->integer('IsDisplay');
                $table->string('Describe');
                $table->integer('Sort');
                $table->integer('State');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
