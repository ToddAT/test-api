<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User as User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //DB::statement('DROP TABLE IF EXISTS users');

      //DB::statement('CREATE TABLE users (id INT NOT NULL AUTO_INCREMENT, fname VARCHAR(255), lname VARCHAR(255), email VARCHAR(255) NOT NULL UNIQUE, token VARCHAR(255) NOT NULL UNIQUE, updated_at DATETIME, created_at DATETIME, primary key (id))');
      
      /*
      DB::table('users')->insert([
        'fname' => 'Peter',
        'lname' => 'Venkman',
        'email' => 'peter.venkman@ghostbusters.com',
        'token' => bin2hex(openssl_random_pseudo_bytes(16)),
      ]);

      DB::table('users')->insert([
        'fname' => 'Ray',
        'lname' => 'Stantz',
        'email' => 'ray.stantz@ghostbusters.com',
        'token' => bin2hex(openssl_random_pseudo_bytes(16)),
      ]);

      DB::table('users')->insert([
        'fname' => 'Egon',
        'lname' => 'Spengler',
        'email' => 'egon.spengler@ghostbusters.com',
        'token' => bin2hex(openssl_random_pseudo_bytes(16)),
      ]);
      */

      \App\User::create([
        'fname' => 'Peter',
        'lname' => 'Venkman',
        'email' => 'peter.venkman@ghostbusters.com',
        'token' => bin2hex(openssl_random_pseudo_bytes(16)),
      ]);

      \App\User::create([
        'fname' => 'Ray',
        'lname' => 'Stantz',
        'email' => 'ray.stantz@ghostbusters.com',
        'token' => bin2hex(openssl_random_pseudo_bytes(16)),
      ]);

      \App\User::create([
        'fname' => 'Egon',
        'lname' => 'Spengler',
        'email' => 'egon.spengler@ghostbusters.com',
        'token' => bin2hex(openssl_random_pseudo_bytes(16)),
      ]);
    }
}
