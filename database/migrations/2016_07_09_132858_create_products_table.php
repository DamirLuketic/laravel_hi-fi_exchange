<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
    // uses of not native name "user_created_id" -> for better column description
            $table->integer('user_created_id');
            $table->integer('approved')->default(0);
            $table->integer('category_id');
            $table->string('model');
            $table->text('specification');
            $table->text('description')->nullable();
            $table->timestamps();
        });
        
        // default data for table "products"

        DB::table('products')->insert(['user_created_id' => '1', 'approved' => 1, 'category_id' => 1, 'model' => 'Amp 1', 'specification' => 'spec 1', 'created_at' => '2016-07-16 00:00:00']);
        DB::table('products')->insert(['user_created_id' => '1', 'approved' => 1, 'category_id' => 1, 'model' => 'Amp 2', 'specification' => 'spec 2', 'created_at' => '2016-07-16 00:00:00']);
        DB::table('products')->insert(['user_created_id' => '1', 'approved' => 1, 'category_id' => 1, 'model' => 'Amp 3', 'specification' => 'spec 3', 'created_at' => '2016-07-16 00:00:00']);
        DB::table('products')->insert(['user_created_id' => '1', 'approved' => 1, 'category_id' => 1, 'model' => 'Amp 4', 'specification' => 'spec 4', 'created_at' => '2016-07-16 00:00:00']);
        DB::table('products')->insert(['user_created_id' => '1', 'approved' => 1, 'category_id' => 2, 'model' => 'CD-P 1', 'specification' => 'spec 5', 'created_at' => '2016-07-16 00:00:00']);
        DB::table('products')->insert(['user_created_id' => '1', 'approved' => 1, 'category_id' => 2, 'model' => 'CD-P 2', 'specification' => 'spec 6', 'created_at' => '2016-07-16 00:00:00']);
        DB::table('products')->insert(['user_created_id' => '1', 'approved' => 1, 'category_id' => 2, 'model' => 'CD-P 3', 'specification' => 'spec 7', 'created_at' => '2016-07-16 00:00:00']);
        DB::table('products')->insert(['user_created_id' => '1', 'approved' => 1, 'category_id' => 3, 'model' => 'SP 1', 'specification' => 'spec 8', 'created_at' => '2016-07-16 00:00:00']);
        DB::table('products')->insert(['user_created_id' => '1', 'approved' => 1, 'category_id' => 3, 'model' => 'SP 2', 'specification' => 'spec 9', 'created_at' => '2016-07-16 00:00:00']);
        DB::table('products')->insert(['user_created_id' => '1', 'approved' => 1, 'category_id' => 3, 'model' => 'SP 3', 'specification' => 'spec 10', 'created_at' => '2016-07-16 00:00:00']);
        DB::table('products')->insert(['user_created_id' => '1', 'approved' => 1, 'category_id' => 3, 'model' => 'SP 4', 'specification' => 'spec 10', 'created_at' => '2016-07-16 00:00:00']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
