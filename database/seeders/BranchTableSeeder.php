<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert([
            ['name' => 'Sydney Branch',
            'address' => 'Sydney,Australia',
            'phone_no' => '9813890246',
            'status' => 1],
            ['name' => 'Canberra',
                'address' => 'Canberra,Australia',
                'phone_no' => '61261696243',
                'status' => 1],
            ['name' => 'Brisbane',
                'address' => 'Brisbane,Australia',
                'phone_no' => '61450319193',
                'status' => 1],
            ['name' => 'Melbourne',
                'address' => 'Melbourne,Australia',
                'phone_no' => '61291717742',
                'status' => 1],
        ]);
    }
}
