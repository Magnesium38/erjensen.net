<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEndpointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endpoints', function (Blueprint $table) {
            $table->increments('id');

            $table->string('action');
            $table->string('description');
            $table->string('authentication')->nullable()->default(null);

            $table->string('method');
            $table->string('route');

            $table->string('options')->nullable()->default(null);
            $table->string('requestDescription')->nullable()->default(null);
            $table->string('responseDescription')->nullable()->default(null);

            $table->boolean('isStatic')->default(false);

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
        Schema::dropIfExists('endpoints');
    }
}
