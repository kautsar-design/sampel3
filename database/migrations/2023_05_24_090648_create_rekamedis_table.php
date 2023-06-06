<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekamedis', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('gender');
            $table->date('date_of_birth')->nullable();
            $table->text('address')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
            $table->text('complaint')->nullable();
            $table->integer('tension')->nullable()->default(0);
            $table->integer('temperature')->nullable()->default(0);
            $table->string('title');
            $table->foreignId('obat_id')->constrained();
            $table->string('total')->nullable();
            $table->foreignId('ruanginap_id')->constrained();
            $table->string('action')->nullable();
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
        Schema::dropIfExists('rekamedis');
    }
};
