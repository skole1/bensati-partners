<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('application_id');
            $table->string('first_name');
            $table->string('other_names');
            $table->string('phone');
            $table->string('email');
            $table->string('case_name');
            $table->double('amount');
            $table->string('payment_option');
            $table->string('status');
            $table->string('trans_id');
            $table->string('ref_id');
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
        Schema::dropIfExists('payments');
    }
}
