<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        // لو ما عندكش مستخدمين جرب تعمل واحد بسيط
        $user = User::first() ?? User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        $statuses = ['pending', 'in-progress', 'completed'];

        // نعمل 20 تاسك عشوائي
        for ($i = 1; $i <= 20; $i++) {
            Task::create([
                'title'       => "Task $i",
                'description' => "Description for task $i",
                'status'      => $statuses[array_rand($statuses)],
                'due_date'    => now()->addDays(rand(1, 30)),
                'user_id'     => $user->id,
            ]);
        }
    }
}
