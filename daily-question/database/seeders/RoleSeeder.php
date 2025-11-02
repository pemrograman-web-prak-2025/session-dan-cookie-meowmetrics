<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class RoleSeeder extends Seeder {
    public function run() {
        DB::table('roles')->insert([
            ['name'=>'admin','description'=>'Administrator'],
            ['name'=>'user','description'=>'Regular user']
        ]);
    }
}
