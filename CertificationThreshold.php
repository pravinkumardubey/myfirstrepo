<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CertificationThreshold extends Model
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
    protected $fillable = ['level_id', 'sub_level_id', 'threshold', 'status'];
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
        'level_id' => 'int',
        'sub_level_id' => 'int',
        'threshold' => 'string',
        'status' => 'string',
    ];

    /**
     * This function will return all feedback by users
     *
     * @param object $getCertificateRequest
     * @return collection
     */
    public static function getAllFeedback($getCertificateRequest)
    {
        $search = $getCertificateRequest->input('searchName');

        return self::with(['levelName', 'subLevelName'])->when($search, function ($nameQuery) use ($search) {
            return $nameQuery->where('certification_thresholds.level_id', 'like', $search . '%');
        })
            ->orderBy($getCertificateRequest->get('sort_by'), $getCertificateRequest->get('order_by'))
            ->paginate($getCertificateRequest->input('length', PERPAGE));
    }

    /**
     * Get the phone record associated with the user.
     */
    public function levelName()
    {
        return $this->hasOne('App\MT\Level', 'id', 'level_id');
    }
    public function subLevelName()
    {
        return $this->hasOne('App\MT\SubLevel', 'id', 'sub_level_id');
    }

    public static function getInfoCertificate($id)
    {
        return self::with(['levelName', 'subLevelName'])->where('id', $id)->first();
    }
}
