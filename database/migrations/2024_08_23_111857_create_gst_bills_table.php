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
        Schema::create('gst_bills', function (Blueprint $table) {
            $table->id();
            $table->integer("party_id")->nullable();
            $table->date("invoice_date")->nullable();
            $table->string("invoice_no")->unique();
            $table->text("item_description")->nullable();
            $table->double("total_amount", 10,2)->default(0);
            $table->double("cgst_rate", 10,2)->default(0);
            $table->double("sgst_rate", 10,2)->default(0);
            $table->double("igst_rate", 10,2)->default(0);
            $table->double("cgst_amount", 10,2)->default(0);
            $table->double("sgst_amount", 10,2)->default(0);
            $table->double("igst_amount", 10,2)->default(0);
            $table->double("tax_amount", 10,2)->default(0);
            $table->double("net_amount", 10,2)->default(0);
            $table->text("declaration")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gst_bills');
    }
};
