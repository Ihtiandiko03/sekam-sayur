<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            'name' => 'Ihtiandiko Wicaksono',
            'email' => 'wihtiandiko@gmail.com',
            'password' => Hash::make('12345'),
            'phone_number' =>  '082377102513',
            'alamat' =>  'Rumah',
            'tgl_lahir' =>  date('Y-m-d'),
            'role' => 1,
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Heksa Dananjaya',
            'email' => 'heksa38a@gmail.com',
            'password' => Hash::make('12345'),
            'phone_number' =>  '082377102513',
            'alamat' =>  'Rumah',
            'tgl_lahir' =>  date('Y-m-d'),
            'role' => 2,
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('kecamatan')->insert([
            'nama_kecamatan' => 'Metro Barat',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        DB::table('kecamatan')->insert([
            'nama_kecamatan' => 'Metro Pusat',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('kecamatan')->insert([
            'nama_kecamatan' => 'Metro Timur',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('kecamatan')->insert([
            'nama_kecamatan' => 'Metro Selatan',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('kecamatan')->insert([
            'nama_kecamatan' => 'Metro Utara',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
