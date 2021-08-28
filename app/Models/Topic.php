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
}
