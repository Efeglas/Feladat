<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsTable extends Migration
{

    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       

        Schema::create('emails', function (Blueprint $table) {
            $table->bigIncrements('email_id');
            $table->string('email'); 
            $table->timestamp('lastsent');                           
            $table->timestamps();
        });

        //date('Y-m-d H:i:s')
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emails');
    }
}
