<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DataTest extends TestCase
{
  use RefreshDatabase;

  /**
   * Checks that the database was properly seeded.
   *
   * @return void
   */
  public function testUserDatabaseSeeded()
  {
    $this->assertDatabaseHas('users', [
      'email' => 'peter.venkman@ghostbusters.com',
    ]);

    $this->assertDatabaseHas('users', [
      'email' => 'ray.stantz@ghostbusters.com',
    ]);

    $this->assertDatabaseHas('users', [
      'email' => 'egon.spengler@ghostbusters.com',
    ]);
  }

  public function testProductDatabaseSeeded()
  {
    $this->assertDatabaseHas('products', [
      'id' => 1,
    ]);
  }

  public function testLinkDatabaseSeeded()
  {
    $this->assertDatabaseHas('links', [
      'id' => 1,
    ]);
  }

}

