<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); // edit posts
            $table->string('slug'); //edit-posts
            $table->timestamps();
        });

        DB::table('plans')->insert(
            [
                'name' => 'Plano 1',
                'slug' => 'plan1',
            ],
            [
                'name' => 'Plano 2',
                'slug' => 'plan2',
            ],
            [
                'name' => 'Plano 3',
                'slug' => 'plan3',
            ]
        );
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
