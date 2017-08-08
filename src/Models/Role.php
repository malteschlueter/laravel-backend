<?php

namespace Mschlueter\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    const SUPER_ADMIN = 'super_admin';

    const ADMIN = 'admin';

    const USER = 'user';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'backend_roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function user() {
        return $this->hasMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public static function getSuperAdmin() {
        return static::getRole(static::SUPER_ADMIN);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public static function getAdmin() {
        return static::getRole(static::ADMIN);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public static function getUser() {
        return static::getRole(static::USER);
    }

    /**
     * @param string $key
     *
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public static function getRole($key) {
        return static::where('key', $key)->first();
    }
}
