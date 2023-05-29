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
        Schema::table('listings', function (Blueprint $table) {
            $table->unsignedTinyInteger('beds');
            $table->unsignedTinyInteger('bathrooms');
            $table->unsignedSmallInteger('area');
            $table->tinyText('city');
            $table->tinyText('postcode');
            $table->tinyText('street');
            $table->tinyText('street_no');
            $table->unsignedInteger('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('listings', function (Blueprint $table) {
        //     //
        // });

            Schema::dropColumns('listings', [
                'beds', 'bathrooms', 'area', 'city', 'postcode', 'street', 'street_no', 'price'
            ]);
    }
};
