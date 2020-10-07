<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info', function (Blueprint $table) {
            
            $table->id();
            $table->string('name',50);
            $table->string('email',50);
            $table->string('gender',50);
           // $table->date('birthdate',0)->default(now());
           // $table->string('discription',50);
           // $table->string('reg_code',50);
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
        Schema::dropIfExists('info');
    }
}

