<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
  //use RefreshDatabase;

  /**
   * A basic test example.
   *
   * @return void
   */
  public function testFetchAUser()
  {
    $user = User::all()->first();
    $this->assertInstanceOf(User::class, $user);
  }

  public function testFetchAllProductsForUserViaAPI()
  {

    $user = User::all()->first();

    $request = [
      'token' => $user->token,
    ];

    $response = $this->json('POST', '/api/users/'.$user->id.'/products', $request);
    $response->assertStatus(200);
  }
}
