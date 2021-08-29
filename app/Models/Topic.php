<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 'body', 'user_id', 'category_id',
        'reply_count', 'view_count', 'last_reply_user_id',
        'order', 'excerpt', 'slug'
    ];

    /**
     * 1 to 1，一個話題屬於一個分類
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * 1 to 1，一個話題屬於一個作者
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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
}
