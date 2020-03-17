<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Requests\Web\Certificate\CertificateRequest;
use App\Model\CertificationThreshold;
use App\Model\Country;
use App\Model\CountryCertificationThreshold;
use Helper;
use Illuminate\Http\Request;
use Response;

class CertificateThresholdController extends AdminBaseController
{
    /**
     * this function will load view
     */
    public function index()
    {
        $res = Country::all();
        return view('admin.certificate.certificate-list', ['res' => $res]);
    }
    /**
     * this function will return certificate list
     */
    public function getAllCertificate(Request $getCertificateRequest)
    {
        Helper::handleDataTableQuery($getCertificateRequest, 'certification_thresholds.id');
        $certificateData = CertificationThreshold::getAllFeedback($getCertificateRequest)->toArray();
        return Response::dataTableJson($certificateData, $getCertificateRequest->input('draw'));
    }
    /**
     * this function will show data in modelbox for edit
     */
    public function getCertificate(Request $request)
    {
        $id = $request->id;

        return CertificationThreshold::getInfoCertificate($id);

    }
    /**
     * this function will updateOrInsert cuntry certificate
     */
    public function updateCertificate(CertificateRequest $request)
    {
        return CountryCertificationThreshold::updateCertifite($request);
    }
}
