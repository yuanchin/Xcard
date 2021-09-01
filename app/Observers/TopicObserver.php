<?php

namespace App\Observers;

use App\Models\Topic;
use App\Jobs\TranslateSlug;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function saving(Topic $topic)
    {
        // XSS 過濾
        $topic->body = clean($topic->body, 'user_topic_body');

        // 生成文章摘錄
        $topic->excerpt = make_excerpt($topic->body);
        
    }

    public function saved(Topic $topic)
    {
        if (!$topic->slug) {

            // 推送任務到隊列
            dispatch(new TranslateSlug($topic));
        }
    }
}