<?php

use Illuminate\Database\Seeder;
//use \database\seeds\menu_options;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            menu_options::class
        ]);
        $this->call([
            site_info::class
        ]);
        $this->call([
            MenuOptionAdvertisement::class
        ]);

        /*$this->call([
            user_menu::class
        ]);
        $this->call([
            users::class
        ]);
        $this->call([
            site_info::class
        ]);*/
    }
}
