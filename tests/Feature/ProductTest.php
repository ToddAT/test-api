<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
  use RefreshDatabase;
  
  public function testCreatingAProduct()
  {
    $user = User::all()->first();

    $request = [
      'name' => 'PKE Meter',
      'description' => 'T tool for detecting ghosts.',
      'price'       => '50000.00',
    ];

    $product = Product::create($request);
    $this->assertInstanceOf(Product::class, $product);
  }

  public function testCreatingAProductViaAPI()
  {
    $user = User::all()->first();
     
    $request = [
      'name' => 'PKE Meter',
      'description' => 'T tool for detecting ghosts.',
      'price'       => '50000.00',
      'token'       => $user->token,
    ];

    $response = $this->json('POST', '/api/products/add', $request);
    $response->assertStatus(200);
  }

  public function testUpdatingAProductViaAPI()
  {
    $user = User::all()->first();
    $product = Product::all()->first();
     
    $request = [
      'name' => 'PKE Meter',
      'description' => 'T tool for detecting ghosts.',
      'price'       => '50000.00',
      'token'       => $user->token,
    ];

    $response = $this->json('POST', '/api/products/'.$product->id.'/update', $request);
    $response->assertStatus(200);
  }

  public function testAddingImageToProductViaAPI()
  {
    Storage::fake('images');

    $user = User::all()->first();
    $product = Product::all()->first();

    $request = [
      'token' => $user->token,
      'image' => UploadedFile::fake()->image('image.jpg'),
    ];

    $response = $this->json('POST', '/api/products/'.$product->id.'/add/image', $request);
    $response->assertStatus(200);
  }

  public function testDeletingAProductViaAPI()
  {
    $user = User::all()->first();
    $product = Product::all()->first();
     
    $request = [
      'token' => $user->token,
    ];

    $response = $this->json('POST', '/api/products/'.$product->id.'/remove', $request);
    $response->assertStatus(200);
  }
}
