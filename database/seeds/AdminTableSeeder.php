<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminRecords = [
            ['id'=>1,'name'=>'admin','type'=>'admin','phone'=>'0987654321','email'=>'admin@admin.com','password'=>'$2y$10$UjD6Go60yyY35TMiW1C2DOGefSBV2c4PklqDFMUZEFJyN9rOniVSO','image'=>'','status'=>1
        ],
        ['id'=>2,'name'=>'luat','type'=>'adminluat','phone'=>'0987654321','email'=>'luat@admin.com','password'=>'$2y$10$UjD6Go60yyY35TMiW1C2DOGefSBV2c4PklqDFMUZEFJyN9rOniVSO','image'=>'','status'=>1
        ],
        ];
        DB::table('admins')->insert($adminRecords);
        // foreach ($adminRecords as $key => $record){
        //     \App\Admin::create($record);
        // }
    }
}
