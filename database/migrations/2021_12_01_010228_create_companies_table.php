<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('corporate_name')->nullable(false);
            $table->string('cnpj')->nullable(false);
            $table->string('phone')->nullable(false);
            $table->string('email')->nullable();
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->integer('number')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('estate')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
