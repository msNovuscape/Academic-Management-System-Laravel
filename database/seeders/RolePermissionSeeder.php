<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_permissions')->insert([
            ['role_id'=>'1', 'permission_id'=>'91'],
            ['role_id'=>'1', 'permission_id'=>'92'],
            ['role_id'=>'1', 'permission_id'=>'93'],
            ['role_id'=>'1', 'permission_id'=>'94'],
            ['role_id'=>'1', 'permission_id'=>'95'],
        ]);
    }
}
