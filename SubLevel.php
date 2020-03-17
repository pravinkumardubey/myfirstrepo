<?php

namespace App\MT;

use Illuminate\Database\Eloquent\Model;

class SubLevel extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mt';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sub_levels';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [];
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = ['last_updated_by', 'created_at', 'updated_at'];
    /**
     * fields will be Carbon-ized
     * @var array
     */
    protected $dates = [];
    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [

    ];
}
