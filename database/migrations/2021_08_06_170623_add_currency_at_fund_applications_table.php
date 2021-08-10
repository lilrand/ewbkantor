<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCurrencyAtFundApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fund_applications', function (Blueprint $table) {

            $table->renameColumn('unit_price', 'unit_price_amount');
            $table->renameColumn('total', 'total_amount');
            $table->string('unit_price_currency', 3);
            $table->string('total_currency', 3);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fund_applications', function (Blueprint $table) {
            //
        });
    }
}
