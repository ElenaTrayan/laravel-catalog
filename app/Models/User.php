<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * Path of avatar of user
     */
    protected $imagePath = '/uploads/users/{alias}/';
    protected $defaultImagePath = '/img/default-avatar.png';

    /**
     * Role
     */
    const ROLE_NONE = 0;
    const ROLE_ADMIN = 1;
    const ROLE_MODERATOR = 2;
    const ROLE_USER = 3;

    public static $roles = [
        self::ROLE_NONE => 'Не задана',
        self::ROLE_ADMIN => 'Администратор',
        self::ROLE_MODERATOR => 'Модератор',
        self::ROLE_USER => 'Пользователь',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('role', '!=', self::ROLE_NONE)->whereNotNull('remember_token');
    }

    /**
     * Check is activated account
     *
     * @return bool
     * @author     It Hill (it-hill.com@yandex.ua)
     * @copyright  Copyright (c) 2015-2017 Website development studio It Hill (http://www.it-hill.com)
     */
    public function isActive()
    {
        return $this->role == self::ROLE_NONE && is_null($this->remember_token)
            ? false : true;
    }



//    /**
//     * Comments of the user
//     *
//     * @return \Illuminate\Database\Eloquent\Relations\HasMany
//     * @author     It Hill (it-hill.com@yandex.ua)
//     * @copyright  Copyright (c) 2015-2017 Website development studio It Hill (http://www.it-hill.com)
//     */
//    public function comments()
//    {
//        return $this->hasMany(Comment::class);
//    }
//
//    /**
//     * User social accounts
//     *
//     * @return \Illuminate\Database\Eloquent\Relations\HasMany
//     * @author     It Hill (it-hill.com@yandex.ua)
//     * @copyright  Copyright (c) 2015-2017 Website development studio It Hill (http://www.it-hill.com)
//     */
//    public function socialAccounts()
//    {
//        return $this->hasMany(UserSocialAccount::class);
//    }

    /**
     * Check is Admin permission
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role == self::ROLE_ADMIN;
    }
}
