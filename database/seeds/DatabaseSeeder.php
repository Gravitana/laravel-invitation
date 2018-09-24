<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Если выходит ошибка "Class <ClassName> does not exist"
         * нужно выполнить
         * composer dumpautoload
         */
    
        $this->call(UsersSeeder::class);
    }
}
