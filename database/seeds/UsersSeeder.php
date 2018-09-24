<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //--- Пользователи
        DB::table('users')->insert([
            'id'            => 10001,
            'surname'       => 'Бендер',
            'name'          => 'Остап',
            'patronymic'    => 'Ибрагимович',
            'email'         => 'admin@example.com',
            'password'      => '$2y$10$ji6pg4Xojs2213mvJFTxuuWRNJAwFwWTMBnavWG6.x7DzjR2PSlDa', //admin@example.com
            'is_admin'      => 1,
            'created_at'    => '2018-09-24 0:0:0',
            'updated_at'    => '2018-09-24 0:0:0',
        ]);
        DB::table('users')->insert([
            'id'            => 10002,
            'surname'       => 'Воробьянинов',
            'name'          => 'Ипполит',
            'patronymic'    => 'Матвеевич',
            'email'         => 'kisa@example.com',
            'password'      => '$2y$10$evgDxM9Z3RdA621exRR/IOCji0hf9/.aX8qS8UsUEbSPFP3denzc2', //kisa@example.com
            'is_admin'      => 0,
            'created_at'    => '2018-09-24 0:20:0',
            'updated_at'    => '2018-09-24 0:20:0',
        ]);
    
        //--- Приглашения
        DB::table('invites')->insert([
            'inviter_id'    => 10001,
            'invitee_id'    => 10002,
            'invite_token'  => '649f09e9ba82a4a19381f6a32697523b',
            'email'         => 'kisa@example.com',
            'message'       => 'Лёд тронулся, господа присяжные заседатели!',
            'used_at'       => '2018-09-24 0:20:0',
            'created_at'    => '2018-09-24 0:10:0',
            'updated_at'    => '2018-09-24 0:10:0',
        ]);
    }
}
