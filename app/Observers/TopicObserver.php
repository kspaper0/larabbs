<?php

namespace App\Observers;

use App\Models\Topic;
/*use App\Handlers\SlugTranslateHandler;*/
use App\Jobs\TranslateSlug;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function saving(Topic $topic)
    {
        // XSS 过滤
        $topic->body = clean($topic->body, 'user_topic_body');

        // 生成话题摘录
        $topic->excerpt = make_excerpt($topic->body);

        // 如 slug 字段无内容，即使用翻译器对 title 进行翻译
        /*if ( ! $topic->slug) {
            $topic->slug = app(SlugTranslateHandler::class)->translate($topic->title);
        }*/

        /* 监控到错误，因为 ID 为空，是由于生成时还未有 ID */
        // if ( ! $topic->slug) {

        //     // 推送任务到队列
        //     dispatch(new TranslateSlug($topic));
        // }
    }

    public function saved(Topic $topic)
    {
        // 如 slug 字段无内容，即使用翻译器对 title 进行翻译
        if ( ! $topic->slug) {

            // 推送任务到队列
            dispatch(new TranslateSlug($topic));
        }
    }

    public function deleted(Topic $topic)
    {
        \DB::table('replies')->where('topic_id', $topic->id)->delete();
        //在模型监听器中，数据库操作需要避免再次 Eloquent 事件，所以这里我们使用了 DB 类进行操作
    }
}