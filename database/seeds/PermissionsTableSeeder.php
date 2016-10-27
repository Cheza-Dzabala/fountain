<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->insert([
            'name' => 'create-loan',
            'display_name' => 'Create Loan',
            'description' => 'Allows Users To Create Loan Applications'
        ]);


        DB::table('permissions')->insert([
            'name' => 'create-user',
            'display_name' => 'Create USer',
            'description' => 'Allows Users To Create Other Users In The  Applications'
        ]);

        DB::table('permissions')->insert([
            'name' => 'approve-loans',
            'display_name' => 'Approve Loans',
            'description' => 'Allows Users To Approve Handing Out Of Loans.'
        ]);

        DB::table('permissions')->insert([
            'name' => 'disburse-funds',
            'display_name' => 'Disburse Funds',
            'description' => 'Allows Users To Disburse Money To Clients.'
        ]);







    }
}
