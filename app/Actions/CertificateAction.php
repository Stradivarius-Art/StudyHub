<?php

namespace App\Actions;

use App\Contracts\CertificateInterface;
use App\Enums\PaymentStatus;
use App\Models\Certificate;
use Illuminate\Http\JsonResponse;

class CertificateAction implements CertificateInterface
{
    public function checkCertificateNumber(array $data): JsonResponse
    {
        /**
         * @var Certificate $certificate
         */
        $certificate = Certificate::where(
            'certificate_number',
            $data['certificate_number']
        )->first();

        if (!$certificate) {
            return response()->json([
                'status' => PaymentStatus::FAILED->value
            ], 200);
        }

        $certificateNumber = $certificate->certificate_number;

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