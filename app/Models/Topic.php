<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 'body', 'category_id', 'excerpt', 'slug'
    ];

    /**
     * 1 to 1，一個話題屬於一個分類
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * 1 to 1，一個話題屬於一個作者
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 1 to many，一個話題擁有多個回覆
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function scopeWithOrder($query, $order)
    {
        // 不同的排序，使用不同的數據讀取邏輯
        switch ($order) {
            case 'recent':
                $query->recent();
                break;

            default:
                $query->recentReplied();
                break;
        }
    }

    public function scopeRecentReplied($query)
    {
        // 返回查詢結果
        return $query->orderBy('updated_at', 'desc');
    }

    public function scopeRecent($query)
    {
        // 返回查詢結果
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * 
     */
    public function link($params = [])
    {
        return route('topics.show', array_merge([$this->id, $this->slug], $params));
    }

    /**
     * 更新回覆數
     */
    public function updateReplyCount()
    {
        $this->reply_count = $this->replies->count();
        $this->save();
    }
}
