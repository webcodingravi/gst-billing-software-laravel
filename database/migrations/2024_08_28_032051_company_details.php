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
        Schema::table('company_details', function (Blueprint $table) {
           $table->string('bank_name')->nullable()->after('gst_no');
           $table->string('account_no')->nullable()->after('bank_name');
           $table->string('ifsc_code')->nullable()->after('account_no');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_details', function (Blueprint $table) {
            $table->dropColumn('bank_name');
           $table->dropColumn('account_no');
           $table->dropColumn('ifsc_code');
        });
    }
};
