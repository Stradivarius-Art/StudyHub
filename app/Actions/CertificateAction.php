<?php

namespace App\Actions;

use App\Contracts\CertificateInterface;
use App\Enums\PaymentStatus;
use Illuminate\Http\JsonResponse;

class CertificateAction implements CertificateInterface
{
    public function checkCertificateNumber(array $data): JsonResponse
    {
        $certificateNumber = $data['certificate_number'];

        $len = \strlen($certificateNumber);
        $lastDigit = $certificateNumber[$len - 1];

        $status = ($lastDigit === '1')
            ? PaymentStatus::SUCCESS->value
            : PaymentStatus::FAILED->value;

        return response()->json([
            'status' => $status
        ], 200);
    }
}