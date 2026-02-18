<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    public function run(): void
    {

        $roleUsers = [

            [

                'user_id' => 1,
                'role_id' => 2,

                'created_at' => now(),
                'updated_at' => now(),

            ],

            [

                'user_id' => 2,
                'role_id' => 1,

                'created_at' => now(),
                'updated_at' => now(),

            ],

        ];

        foreach ($roleUsers as $data) {

            DB::table('role_user')->updateOrInsert(

                [

                    'user_id' => $data['user_id'],
                    'role_id' => $data['role_id'],

                ],

                $data

            );

        }

    }
}
