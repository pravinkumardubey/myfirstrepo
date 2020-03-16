<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminBaseController;
use App\Model\Feedback;
use Helper;
use Illuminate\Http\Request;
use Response;

class FeedbackController extends AdminBaseController
{
    /**
     * this function will return view
     *
     * @return void
     */
    public function index()
    {
        return view('admin.feedback.feedback-list');
    }
    /**
     * This function will feedback data for listing
     *
     * @param Request $getFeedbackRequest
     * @return json
     */
    public function getAllFeedback(Request $getFeedbackRequest)
    {
        Helper::handleDataTableQuery($getFeedbackRequest, 'feedbacks.id');
        $countryData = Feedback::getAllFeedback($getFeedbackRequest)->toArray();
        return Response::dataTableJson($countryData, $getFeedbackRequest->input('draw'));
    }
}
