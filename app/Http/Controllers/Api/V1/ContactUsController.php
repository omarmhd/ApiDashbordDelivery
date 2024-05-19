<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\Api\V1\StoreContactUsRequest;
use App\Models\ContactUs;
use App\Service\UploadService;

class ContactUsController extends ApiBaseController
{
    public function store(StoreContactUsRequest $request, UploadService $uploadService)
    {

        $inputs = $request->validated();

        if ($request->hasFile('file')) {
            $inputs['file']  = $uploadService->uploadWithPath($request->file, 'contacts');
        }
        ContactUs::create($inputs);
        return $this->setSuccess(trans('messages.send_your_request'))
            ->getResponse();
    }
}
