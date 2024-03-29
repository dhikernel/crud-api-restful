<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentsTable extends Migration
{
    public function up()
    {
        Schema::create('coments', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('id_post');
            $table->string('coment');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coments');
    }
}
