<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->string('reporter_name');
            $table->string('department');
            $table->string('issue_name');
            $table->timestamp('reported_at');
            $table->string('impacted_service');
            $table->string('assigned_to');
            $table->string('second_assigned_to');
            $table->text('comment')->nullable();
            $table->string('status')->default('new'); // Add the status column with default value 'new'
            $table->integer('sla')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('issues');
    }
}
