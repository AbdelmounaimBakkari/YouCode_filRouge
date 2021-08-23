<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 2; $i++) {
            $role = new \App\Models\Role();
            $role->name = $i === 0 ? 'Freelance' : 'Client';
            $role->save();
        }
    }
}
