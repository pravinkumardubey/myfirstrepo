<?php

namespace App\PermissionModule;

use Illuminate\Database\Eloquent\Model;

class RoleRestrictionPermission extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'role_id', 'restricted_modules', 'restricted_routes',
    ];

    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = ['created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    /**
     * fields will be Carbon-ized
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
    ];

    /**
     * laravel mutator convert value in string form
     *
     * @param string $value
     * @return string
     */
    public function getRestrictedModulesAttribute($value)
    {
        return json_decode($value, true);
    }
    /**
     * laravel mutator convert value in string form
     *
     * @param string $value
     * @return string
     */
    public function getRestrictedRoutesAttribute($value)
    {
        return json_decode($value, true);
    }

}
