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
            $table->bigIncrements('id');
            $table->string('failed_jobs_uuid');
            $table->string('to')->nullable(false);
            $table->string('subject')->nullable(false);
            $table->text('message')->nullable(false);
            $table->string('send_type')->nullable(true)->default(null);
            $table->string('origin')->nullable(true)->change();
            $table->string('from')->nullable(false);
            $table->string('reply_to')->nullable(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
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
