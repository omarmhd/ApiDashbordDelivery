<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LaratrustSeeder::class,
            ResturantSeeder::class,
        ]);
        $user = User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'phone' => '0599999999',
            'gender' => 'ذكر',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $user->attachRole('admin');
        $clients = User::factory(10)->create();
        foreach ($clients as $key => $client)
            if ($key < 8)
                $client->attachRole('client');
            else {
                $client->attachRole('driver');
                Driver::create(['user_id' => $client->id]);
            }
    }
}
