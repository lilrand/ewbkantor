<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyFundApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fund_applications', function (Blueprint $table) {

            $table->renameColumn('no_fund', 'application_number');
            $table->date('application_date')->change();
            $table->bigInteger('unit_price')->change();
            $table->bigInteger('quantity')->change();
            $table->bigInteger('total')->change();
            $table->string('status', 20)->change();
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
