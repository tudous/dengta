<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   
         public function up()
        {
            $categories = [
                [
                    'name'        => '主菜',
                    
                ],
                [
                    'name'        => '汤品',
                    
                ],
                [
                    'name'        => '小吃',
                ],
                [
                    'name'        => '饮料',
                ],
            ];

            DB::table('categories')->insert($categories);
        }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
