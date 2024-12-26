<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->json('requirements')->nullable(); // JSON for application requirements
            $table->json('guides')->nullable();       // JSON for user guides or steps
            $table->text('source_code_link')->nullable(); // Git repository link
            $table->text('file_path')->nullable();    // Path to ZIP file for offline access
            $table->text('thumbnail')->nullable();    // Optional thumbnail path
            $table->string('latest_version', 20)->nullable(); // Version number
            $table->enum('status', ['active', 'deprecated', 'in-development'])->default('active'); // Status aplikasi
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
