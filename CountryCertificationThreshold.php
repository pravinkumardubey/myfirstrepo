<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CountryCertificationThreshold extends Model
{

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['country_id', 'threshold_ref_id', 'threshold', 'status'];
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [];
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
        'country_id' => 'int',
        'threshold_ref_id' => 'int',
        'threshold' => 'string',
        'status' => 'int',
    ];
    /**
     * This function will update certificate
     *
     * @param object $request
     * @return collection
     */
    public static function updateCertifite($request)
    {
        return Self::updateOrInsert(
            ['threshold_ref_id' => $request->certificate_id],
            ['country_id' => $request->country_id,
                'threshold_ref_id' => $request->certificate_id,
                'threshold' => $request->threshold,
                'status' => 1,
            ]
        );
    }
}
