<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use HasRoles;
    use HasFactory, MustVerifyEmailTrait;

    use Notifiable {
        notify as protected laravelNotify;
    }

    public function notify($instance)
    {
        // 要通知的人為當前用戶，就不必通知了 ~~
        if ($this->id == Auth::id()) {
            return;
        }

        if (method_exists($instance, 'toDatabase')) {
            $this->increment('notification_count');
        }

        $this->laravelNotify($instance);
    }

    /**
     * 清空未讀消息數
     */
    public function markAsRead()
    {
        $this->notification_count = 0;
        $this->save();
        $this->unreadNotifications->markAsRead();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'introduction',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 1 to many，一個使用者可以發布多個話題
     */
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    /**
     * 1 to many，一個使用者可以有多個回覆
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * 
     */
    public function isAuthorOf($model)
    {
        return $this->id == $model->user_id;
    }

    /**
     * 密碼修改器
     */
    public function setPasswordAttribute($value)
    {
        if (strlen($value) != 60) {
            // 不等於60，做密碼加密處理
            $value = bcrypt($value);
        }

        $this->attributes['password'] = $value;
    }

    /**
     * 頭貼修改器
     */
    public function setAvatarAttribute($path)
    {
        // 如果不是 `http` 子串開頭，那就是從後台上傳的，需要補全 URL
        if ( ! \Str::startsWith($path, 'http')) {

            // 拼接完整的 URL
            $path = config('app.url') . "/uploads/images/avatars/$path";
        }

        $this->attributes['avatar'] = $path;
    }
}
