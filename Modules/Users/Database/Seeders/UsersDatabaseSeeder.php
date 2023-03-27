<?php

namespace Modules\Users\Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Hash;
class UsersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
       'name'=>'Super Admin',
       'username'=>'admin',
       'email'=>'admin@gmail.com',
       'first_name'=>'Mahesh',
       'middle_name'=>'Kumar',
       'last_name'=>'Singh',
       'mobile_no'=>'9661234878',
       'user_type'=>'admin',
       'status'=> '1',
       'password'=>Hash::make('Pass@123'),
       'is_admin'=>1,
       'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
       'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

      ]);
      DB::table('users')->insert([
        'name'=>'User',
        'username'=>'rakesh3423',
        'email'=>'rakesh@gmail.com',
        'first_name'=>'Rakesh',
        'middle_name'=>'Kumar',
        'last_name'=>'Singh',
        'mobile_no'=>'9661234878',
        'user_type'=>'user',
        'status'=> '1',
        'password'=>Hash::make('Pass@123'),
        'is_admin'=>0,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
 
       ]);

       DB::table('users')->insert([
        'name'=>'Customer',
        'username'=>'ramesh1235',
        'email'=>'ramesh9078@gmail.com',
        'first_name'=>'Ramesh',
        'middle_name'=>'Kumar',
        'last_name'=>'Singh',
        'mobile_no'=>'9404520736',
        'user_type'=>'customer',
        'status'=> '1',
        'password'=>Hash::make('Pass@123'),
        'is_admin'=>0,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
 
       ]);

       DB::table('users')->insert([
        'name'=>'user',
        'username'=>'anvi1234',
        'email'=>'anvi@gmail.com',
        'first_name'=>'Anvi',
        'middle_name'=>'Kumari',
        'last_name'=>'Singh',
        'mobile_no'=>'9661234878',
        'user_type'=>'user',
        'status'=> '0',
        'password'=>Hash::make('Pass@123'),
        'is_admin'=>0,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
 
       ]);

       DB::table('users')->insert([
        'name'=>'customer',
        'username'=>'ravi4567',
        'email'=>'ravi123@gmail.com',
        'first_name'=>'Ravi',
        'middle_name'=>'Kumar',
        'last_name'=>'Singh',
        'mobile_no'=>'9861234834',
        'user_type'=>'customer',
        'status'=> '2',
        'password'=>Hash::make('Pass@123'),
        'is_admin'=>0,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
 
       ]);
 

        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
