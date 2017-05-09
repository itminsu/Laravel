<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Privilege;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(UserPrivilegesTableSeeder::class);
        $this->call(UserHasUserPrivilegesTableSeeder::class);

    }
}

class UsersTableSeeder extends Seeder{
    public function run()
    {
        DB::table('users')->delete();

        User::create(['name' => 'Administrator',
                      'email' => 'admin@nscc.ca',
                      'password'=> 'password',
                      'created_by' => '1',
                      'updated_by' => '1']);

        User::create(['name' => 'Editor', 'email' => 'editor@nscc.ca', 'password'=> 'password', 'created_by' => '1', 'updated_by' => '1']);
        User::create(['name' => 'Author', 'email' => 'author@nscc.ca', 'password'=> 'password', 'created_by' => '1', 'updated_by' => '1']);

    }
}

class UserPrivilegesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('user_privileges')->delete();

        Privilege::create(['name' => 'Admin', 'description' => 'Administrator']);
        Privilege::create(['name' => 'Editr', 'description' => 'Editor']);
        Privilege::create(['name' => 'Authr', 'description' => 'Author']);
    }

}

class UserHasUserPrivilegesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('user_has_user_privilege')->insert(['user_id' => '1', 'privilege_id' => '1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('user_has_user_privilege')->insert(['user_id' => '2', 'privilege_id' => '2', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('user_has_user_privilege')->insert(['user_id' => '3', 'privilege_id' => '3', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

    }

}
