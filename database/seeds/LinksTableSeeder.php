<?php

use Illuminate\Database\Seeder;
use App\User as User;
use App\Product as Product;
use App\Link as Link;

class LinksTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $user = User::all()->first();
    $product = Product::all()->first();
    $user->products()->save($product);
  }
}
