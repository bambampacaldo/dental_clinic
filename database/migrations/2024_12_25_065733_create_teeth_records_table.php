<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('teeth_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->string('tooth_number');
            $table->string('condition');
            $table->string('procedure_done')->nullable();
            $table->text('notes')->nullable();
            $table->date('procedure_date')->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            $table->enum('status', ['healthy', 'needs_treatment', 'under_treatment', 'treated']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teeth_records');
    }
};