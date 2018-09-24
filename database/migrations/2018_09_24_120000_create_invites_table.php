<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invites', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('inviter_id');
            $table->unsignedInteger('invitee_id')->nullable(); // заполнится при использовании приглашения
            $table->string('invite_token');
            $table->string('email')->comment('Куда выслано приглашение');
            $table->string('message')->nullable()->comment('Текст приглашения');
            $table->timestamp('used_at')->nullable()->comment('Когда использовано приглашение');
            $table->timestamps();
    
            /* ключи */
            $table->unique('invite_token');
            $table->unique('email');
    
            /* внешние ключи */
            $table->foreign('inviter_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('invitee_id')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invites');
    }
}
