<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orderdetails')->insert([
            ['orderID' => '3','foodID' => '1', 'qty'=>'1', 'price' => '200000']
         ]);
        }
}
