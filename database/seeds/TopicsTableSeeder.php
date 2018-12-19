<?php

use Illuminate\Database\Seeder;
use App\Models\Topic;
use App\Models\User;
use App\Models\Category;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
       // 所有用户 ID 数组，如：[1,2,3,4]
        $user_ids = User::all()->pluck('id')->toArray();

        // 所有分类 ID 数组，如：[1,2,3,4]
        $category_ids = Category::all()->pluck('id')->toArray();

        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        $topics = factory(Topic::class)
                        ->times(100)
                        ->make()
                        ->each(function ($topic, $index)
                            use ($user_ids, $category_ids, $faker)
                        //each() 用来迭代集合中的内容，将其传递到回调函数中
                        //use() 匿名函数中必须通过 use 声明来使用本地变量
                        //$topic 为要传递的值，每一个topic
                        //$user_ids, $category_ids, $faker 为用到的本地变量
                            {
                                // 从用户 ID 数组中随机取出一个并赋值
                                $topic->user_id = $faker->randomElement($user_ids);

                                // 话题分类，同上
                                $topic->category_id = $faker->randomElement($category_ids);
                            });

        // 将数据集合转换为数组，并插入到数据库中
        Topic::insert($topics->toArray());
    }

}

