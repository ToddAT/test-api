<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Product;
use App\Link;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LinkTest extends TestCase
{
  use RefreshDatabase;
  /**
   * A basic test example.
   *
   * @return void
   */

  public function testCreatingALinkViaAPI()
  {
    $user = User::all()->get(1);
    $product = Product::all()->get(0);
     
    $request = [
      'token' => $user->token,
    ];

    $response = $this->json('POST', '/api/users/'.$user->id.'/own/'.$product->id, $request);
    $response->assertStatus(200);
  }

  public function testRemovingALinkViaAPI()
  {
    $user = User::all()->get(0);
    $product = Product::all()->get(0);
     
    $request = [
      'token' => $user->token,
    ];

    $response = $this->json('POST', '/api/users/'.$user->id.'/disown/'.$product->id, $request);
    $response->assertStatus(200);
  }

  public function testTransferringALinkViaAPI()
  {
    $users = User::all();
    $user = $users->get(0);
    $newUser = $users->get(1);
    $product = Product::all()->get(0);
     
    $request = [
      'token' => $user->token,
    ];

    $response = $this->json('POST', '/api/users/'.$user->id.'/transfer/'.$product->id.'/to/'.$newUser->id, $request);
    $response->assertStatus(200);
  }

}
