<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
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
    protected $fillable = ['title', 'message', 'comment_by'];
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
        'title' => 'string',
        'message' => 'string',
        'comment_by' => 'int',
    ];

    /**
     * This function will return all feedback by users
     *
     * @param object $getFeedbackRequest
     * @return collection
     */
    public static function getAllFeedback($getFeedbackRequest)
    {
        $title = $getFeedbackRequest->input('searchName');

        return self::select('users.name', 'feedback.title', 'feedback.message')
            ->join('users', 'feedback.comment_by', 'users.id')
            ->when($title, function ($nameQuery) use ($title) {
                return $nameQuery->where('feedback.title', 'like', $title . '%');
            })
            ->orderBy($getFeedbackRequest->get('sort_by'), $getFeedbackRequest->get('order_by'))
            ->paginate($getFeedbackRequest->input('length', PERPAGE));
    }
}
