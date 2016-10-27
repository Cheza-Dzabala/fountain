<?php

use Illuminate\Database\Seeder;

class applicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('applicationStatus')->insert([
            'name' => 'Pending',
        ]);

        DB::table('applicationStatus')->insert([
            'name' => 'Approved',
        ]);

        DB::table('applicationStatus')->insert([
            'name' => 'Rejected',
        ]);

        DB::table('applicationStatus')->insert([
            'name' => 'Defaulted',
        ]);

    }
}
