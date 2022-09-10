<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreContactUsRequest;
use App\Http\Resources\V1\RestaurantResource;
use App\Models\ContactUs;
use App\Models\Restaurant;
use App\Service\UploadService;
use App\Traits\ApiResponder;

class ContactUsController extends Controller
{
    use ApiResponder;
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
