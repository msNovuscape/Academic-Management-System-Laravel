<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_branches')->insert([
            ['user_id'=>'1','branch_id'=>'1'],
            ['user_id'=>'1','branch_id'=>'2'],
            ['user_id'=>'1','branch_id'=>'3'],
        ]);
    }
}
