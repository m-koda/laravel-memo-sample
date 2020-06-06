<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Memo;
use App\Tag;
use Illuminate\Support\Arr;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $base_tags = [
            'AWS',
            'GCP',
            'Azure',
            'k8s',
            'Docker',
            'Laravel',
            'PHP',
            'Go',
            'Javascript',
            'Wordpress',
            'MySQL',
            'ECS',
            'GKE'
        ];

        $user_a = new User();
        $user_a->name = 'aaa';
        $user_a->email = 'aaa@example.com';
        $user_a->password = Hash::make('aaaaaaaa');
        $user_a->save();
        $user_a->memos()->saveMany(factory(App\Memo::class, 30)->make());
        $user_a_memos = Memo::where('user_id', $user_a->id)->get();
        foreach ($user_a_memos as $user_a_memo) {
            $num = rand(2, 5);
            $tags = Arr::random($base_tags, $num);
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $user_a_memo->tags()->attach($tag);
            }
        };

        $user_b = new User();
        $user_b->name = 'bbb';
        $user_b->email = 'bbb@example.com';
        $user_b->password = Hash::make('bbbbbbbb');
        $user_b->save();
        $user_b->memos()->saveMany(factory(App\Memo::class, 30)->make());
        $user_b_memos = Memo::where('user_id', $user_b->id)->get();
        foreach ($user_b_memos as $user_b_memo) {
            $num = rand(2, 5);
            $tags = Arr::random($base_tags, $num);
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $user_b_memo->tags()->attach($tag);
            }
        };
    }
}
