<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('applications')->onDelete('cascade');
            $table->string('version', 10);
            $table->timestamp('update_date')->useCurrent();
            $table->text('update_details')->nullable();
            $table->string('guide_file_path')->nullable();
            $table->string('file_path')->nullable(); // Path to ZIP file for offline access
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_updates');
    }
};
