<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_a = new User();
        $user_a->name = 'aaa';
        $user_a->email = 'aaa@example.com';
        $user_a->password = Hash::make('aaaaaaaa');
        $user_a->save();
        $user_a->memos()->saveMany(factory(App\Memo::class, 5)->make());

        $user_b = new User();
        $user_b->name = 'bbb';
        $user_b->email = 'bbb@example.com';
        $user_b->password = Hash::make('bbbbbbbb');
        $user_b->save();
        $user_b->memos()->saveMany(factory(App\Memo::class, 5)->make());
    }
}
