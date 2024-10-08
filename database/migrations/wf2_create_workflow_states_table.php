<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        $tableName = app(\Soap\WorkflowLoader\DatabaseLoader::class)->getWorkflowStateTableName();
        Schema::create($tableName, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('initial_state')->default(0)->comment('initial state');
            $table->tinyInteger('final_state')->default(0)->comment('final state');
            $table->foreignId('workflow_id')->constrained('workflows')->onDelete('cascade');
            $table->json('metadata')->nullable()->comment('metadata');
            $table->timestamps();
        });
    }

    public function down()
    {
        $tableName = app(\Soap\WorkflowLoader\DatabaseLoader::class)->getWorkflowStateTableName();
        Schema::dropIfExists($tableName);
    }
};
