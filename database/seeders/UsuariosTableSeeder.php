<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            ['name' => 'John Doe', 'email' => 'john.doe@example.com'],
            ['name' => 'Jane Smith', 'email' => 'jane.smith@example.com'],
            ['name' => 'Alice Johnson', 'email' => 'alice.johnson@example.com'],
            ['name' => 'Bob Brown', 'email' => 'bob.brown@example.com'],
            ['name' => 'Rachel Adams', 'email' => 'rachel.adams@example.com'],
            ['name' => 'Robert Wilson', 'email' => 'robert.wilson@example.com'],
            ['name' => 'Emily Davis', 'email' => 'emily.davis@example.com'],
            ['name' => 'Michael Clark', 'email' => 'michael.clark@example.com'],
            ['name' => 'Sophia Martinez', 'email' => 'sophia.martinez@example.com'],
            ['name' => 'Daniel Orantes', 'email' => 'jdofrarospaq@gmail.com'],
        ]);
    }
}
