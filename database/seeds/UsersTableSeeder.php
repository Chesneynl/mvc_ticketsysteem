<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name' => 'Chesney',
            'email' => 'chesneybuitendijk@gmail.com',
            'admin' => 1,
        ]);

        factory(App\User::class)->create([]);
    }
}
