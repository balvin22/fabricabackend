<?php

namespace Database\Seeders;

use App\Models\transactiontype;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password'=>'123456789'
        ]);
        User::factory()->create([
            'name' => 'balvin',
            'email' => 'balvin@example.com',
            'password'=>'123456789'
        ]);
        User::factory()->create([
            'name' => 'antonieta',
            'email' => 'antonieta@example.com',
            'password'=>'123456789'
        ]);
        $this->call([
            TransactionTypeSeeder::class
        ]);

    }
}
