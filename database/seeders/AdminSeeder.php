<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = User::create([
          'name' => 'admin',
          'email' => 'admin@admin.com',
          'password' => Hash::make('password'),
          'role' => 'admin',
      ]);

      event(new Registered($user));

      Auth::login($user);
    }
}
