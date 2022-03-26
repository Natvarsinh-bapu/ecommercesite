<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->string('name')->nullabe();
            $table->string('short_desc')->nullabe();
            $table->string('price')->nullabe();
            $table->string('price_display')->nullabe();
            $table->string('special_label')->nullabe();
            $table->string('label_type')->nullabe();
            $table->longText('description')->nullable();
            $table->string('image')->nullabe();
            $table->integer('status')->default(1);
            $table->integer('best_seller')->default(0);
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
        Schema::dropIfExists('products');
    }
}
