<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\UserType;
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
        \App\Models\User::factory(5)->create([
            'type' => UserType::Sender()
        ])->each(function ($data) {
            \App\Models\Parcel::factory(10)->create([
                'sender_id' => $data->id,
            ]);
        });

        \App\Models\User::factory(10)->create([
            'type' => UserType::Biker()
        ]);
    }
}
