<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Sale extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sale')->insert([
            'amount_products' => Str::random(10),
            'total' => Str::random(10),
            'client_id' => Str::random(10),
            'product_id' => Str::random(10),
        ]);
    }
}
