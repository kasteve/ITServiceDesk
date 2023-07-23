<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlaRulesTable extends Migration
{
    public function up()
    {
        Schema::create('sla_rules', function (Blueprint $table) {
            $table->id();
            $table->string('priority');
            $table->integer('response_time'); // Time in minutes
            $table->integer('resolution_time'); // Time in minutes
            // Add other columns as needed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sla_rules');
    }
}
