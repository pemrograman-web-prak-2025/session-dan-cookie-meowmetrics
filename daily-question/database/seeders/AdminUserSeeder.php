<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class AdminUserSeeder extends Seeder {
    public function run() {
        $adminId = DB::table('users')->insertGetId([
            'name'=>'Admin',
            'email'=>'admin@example.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make('password'),
            'remember_token'=>Str::random(10),
            'role_id'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
