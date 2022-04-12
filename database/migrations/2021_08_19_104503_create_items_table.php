<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('items', function (Blueprint $table) {
      $table->id();
      $table->string('item_name');
      $table->string('category');
      $table->string('item_type');
      $table->string('barcode',20)->nullable();
      $table->string('company_name');
      $table->string('cost_price');
      $table->string('sale_price');
      $table->string('bulk_price');
      $table->string('available_quantity');
      $table->string('description');
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('items');
  }
}
