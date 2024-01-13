<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('supplier-infos', function (Blueprint $table) {
            $table->id('supplier_id');
            $table->string('supplier_name',255);
            $table->string('email',255);
            $table->string('address',255);
            $table->string('phone',11);
            $table->string('contact_person',255);
            $table->boolean('act/inact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
