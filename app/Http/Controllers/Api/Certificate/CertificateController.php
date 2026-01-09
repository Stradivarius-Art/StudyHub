<?php

namespace App\Http\Controllers\Api\Certificate;

use App\Contracts\CertificateInterface;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Certificate\CertificateRequest;

class CertificateController extends Controller
{
    public function check(CertificateInterface $action, CertificateRequest $request): JsonResponse
    {
        return $action->checkCertificateNumber($request->toArray());
    }
}