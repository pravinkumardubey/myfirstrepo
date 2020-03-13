<?php

namespace App\PermissionModule;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{

    /**
     * The primary key associated with the table.
     * @var int
     */

    protected $primaryKey = 'route_id';

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

    ];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The model's default values for attributes.
     * these things will be visible in relationship
     * @var array
     */
    protected $attributes = [
    ];
}
