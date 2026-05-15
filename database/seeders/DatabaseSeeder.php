<?php

namespace Database\Seeders;

use App\Models\Mail;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Mail::factory(50)->create()->each(function (Mail $mail) {
            Subscriber::factory(100)->create([
                'mail_id' => $mail->id,
            ]);
        });
    }
}
