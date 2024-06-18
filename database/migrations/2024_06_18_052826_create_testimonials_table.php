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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('profession')->nullable();
            $table->longText('message')->nullable();
            $table->string('image')->nullable();
            $table->string('display')->default('0');
            $table->integer('order_no')->nullable();
            $table->text('meta_og_title')->nullable();
            $table->text('meta_og_description')->nullable();
            $table->string('og_image')->nullable();
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
        Schema::dropIfExists('testimonials');
    }
};
