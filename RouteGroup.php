<?php

namespace App\PermissionModule;

use Illuminate\Database\Eloquent\Model;

class RouteGroup extends Model
{

    /**
     * The primary key associated with the table.
     * @var int
     */

    protected $primaryKey = 'route_group_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [

    ];

    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = [

    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'module_id',

    ];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [

    ];

    /**
     * The model's default values for attributes.
     * these things will be visible in relationship
     * @var array
     */
    protected $attributes = [
    ];

    public function getRouteGroupLabelAttribute($value)
    {
        return (string) $value;
    }

    public function getRoutes()
    {
        return $this->hasMany('App\PermissionModule\Route', 'route_group_id', 'route_group_id')->distinct('route_name');
    }
}
