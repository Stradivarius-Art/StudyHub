<?php

namespace App\Contracts;

use Illuminate\Http\JsonResponse;

interface CertificateInterface
{
    public function checkCertificateNumber(array $data): JsonResponse;
}