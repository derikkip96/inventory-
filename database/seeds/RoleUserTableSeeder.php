<?php



use Illuminate\Database\Seeder;



class RoleUserTableSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        DB::table('role_user')->truncate();
        DB::table('role_user')->insert([
  			   ['user_id' => 1, 'role_id' => 1]
        	]);

    }

}

