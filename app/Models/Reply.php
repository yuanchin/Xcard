<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reply extends Model
{
    use HasFactory;
    
    protected $fillable = ['content'];

    /**
     * 1 to 1，一個回覆屬於一個話題
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    /**
     * 1 to 1，一個回覆屬於一個用戶
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
