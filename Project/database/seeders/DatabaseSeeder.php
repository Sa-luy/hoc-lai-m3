<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    public function run()
    {
        // $this->importCategories();
        // $this->importProducts();
        $this->importUsers();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
    public function importCategories()
    {
        DB::table('categories')->insert([
            'name' => Str::random(10),
        ]);
        DB::table('categories')->insert([
            'name' => Str::random(10),
        ]);
        DB::table('categories')->insert([
            'name' => Str::random(10),
        ]);
        DB::table('categories')->insert([
            'name' => Str::random(10),
        ]);
        DB::table('categories')->insert([
            'name' => Str::random(10),
        ]);
        DB::table('categories')->insert([
            'name' => Str::random(10),
        ]);
        DB::table('categories')->insert([
            'name' => Str::random(10),
        ]);
    }
    public function importProducts()
    {
        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => mt_rand(1000000, 9999999),
            'amouth' =>mt_rand(10, 100),
            'use' => Str::random(30),
            'image' => 'C/Saluy/'.Str::random(20),
            'status' => Str::random(30),
            'description' => Str::random(30),
            'category_id' => mt_rand(1, 12),
        ]);
      
        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => mt_rand(1000000, 9999999),
            'amouth' =>mt_rand(10, 100),
            'use' => Str::random(30),
            'image' => 'C/Saluy/'.Str::random(20),
            'status' => Str::random(30),
            'description' => Str::random(30),
            'category_id' => mt_rand(1, 12),
        ]);
      
        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => mt_rand(1000000, 9999999),
            'amouth' =>mt_rand(10, 100),
            'use' => Str::random(30),
            'image' => 'C/Saluy/'.Str::random(20),
            'status' => Str::random(30),
            'description' => Str::random(30),
            'category_id' => mt_rand(1, 12),
        ]);
      
        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => mt_rand(1000000, 9999999),
            'amouth' =>mt_rand(10, 100),
            'use' => Str::random(30),
            'image' => 'C/Saluy/'.Str::random(20),
            'status' => Str::random(30),
            'description' => Str::random(30),
            'category_id' => mt_rand(1, 12),
        ]);
      
        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => mt_rand(1000000, 9999999),
            'amouth' =>mt_rand(10, 100),
            'use' => Str::random(30),
            'image' => 'C/Saluy/'.Str::random(20),
            'status' => Str::random(30),
            'description' => Str::random(30),
            'category_id' => mt_rand(1, 12),
        ]);
      
        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => mt_rand(1000000, 9999999),
            'amouth' =>mt_rand(10, 100),
            'use' => Str::random(30),
            'image' => 'C/Saluy/'.Str::random(20),
            'status' => Str::random(30),
            'description' => Str::random(30),
            'category_id' => mt_rand(1, 12),
        ]);
      
        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => mt_rand(1000000, 9999999),
            'amouth' =>mt_rand(10, 100),
            'use' => Str::random(30),
            'image' => 'C/Saluy/'.Str::random(20),
            'status' => Str::random(30),
            'description' => Str::random(30),
            'category_id' => mt_rand(1, 12),
        ]);
      
        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => mt_rand(1000000, 9999999),
            'amouth' =>mt_rand(10, 100),
            'use' => Str::random(30),
            'image' => 'C/Saluy/'.Str::random(20),
            'status' => Str::random(30),
            'description' => Str::random(30),
            'category_id' => mt_rand(1, 12),
        ]);
      
        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => mt_rand(1000000, 9999999),
            'amouth' =>mt_rand(10, 100),
            'use' => Str::random(30),
            'image' => 'C/Saluy/'.Str::random(20),
            'status' => Str::random(30),
            'description' => Str::random(30),
            'category_id' => mt_rand(1, 12),
        ]);
      
      
    }
    public function importUsers()
    {
        DB::table('users')->insert([  
            'name' => 'saluy_admin',
            'email' => 'saluy_admin@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '0947281265',
            'address' =>'Gio Hai',
            'day_of_birth' => Carbon::create('1992', '01', '01'),
            'image' => Str::random(5),
         ]);
        DB::table('users')->insert([  
            'name' => 'saluy_user',
            'email' => 'saluy_user@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '0947281265',
            'address' =>'Gio Hai',
            'day_of_birth' => Carbon::create('1992', '01', '01'),
            'image' => Str::random(5),
         ]);
        DB::table('users')->insert([  
            'name' => 'saluy_guest',
            'email' => 'saluy_guest@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '0947281265',
            'address' =>'Gio Hai',
            'day_of_birth' => Carbon::create('1992', '01', '01'),
            'image' => Str::random(5),
         ]);
        DB::table('users')->insert([  
            'name' => 'saluy_developer',
            'email' => 'saluy_developer@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '0947281265',
            'address' =>'Gio Hai',
            'day_of_birth' => Carbon::create('1992', '01', '01'),
            'image' => Str::random(5),
         ]);
         for($i=1;$i<=10;$i++){
        DB::table('users')->insert([  
            'name' => Str::random(5).'_'.Str::random(3),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '+849'.mt_rand(10000, 99999),
            'address' =>Str::random(5).' '.Str::random(5).' '.Str::random(5),
            'day_of_birth'  => Carbon::create('1992', '01', '01'),
            'image' => Str::random(5),
         ]);
        }
        
    }
}
