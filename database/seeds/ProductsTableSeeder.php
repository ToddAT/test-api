<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Product as Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Product::create([
          'name' => 'Ecto-One',
          'description' => 'A hearse converted into an anti-ghost vehicle.',
          'price'       => '75000.00',
        ]);
    }
}
