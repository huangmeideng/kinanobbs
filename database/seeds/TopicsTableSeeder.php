<?php

use Illuminate\Database\Seeder;
use App\Models\Topic;
use App\Models\User;
use App\Models\Category;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        //所有用户ID数组，如：[1,2,3,4]
        $user_ids = User::all()->pluck('id')->toArray();
        //所有分类数组id
        $category_ids = Category::all()->pluck('id')->toArray();
        //获取Faker实例
        $faker = app(Faker\Generator::class);
        $topics = factory(Topic::class)
                        ->times(100)
                        ->make()
                        ->each(function ($topic, $index)
                            use ($user_ids,$category_ids,$faker)
        {
            //从用户id数组中随机获取一个并赋值
            $topic->user_id = $faker->randomElement($user_ids);
            //话题分类
            $topic->category_id = $faker->randomElement($category_ids);
        });
        //将数据集合转化为数组，并插入到数据库中
        Topic::insert($topics->toArray());
    }

}

