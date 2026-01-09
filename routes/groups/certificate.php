<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Certificate\CertificateController;

Route::post('check-certificate', [CertificateController::class, 'check']);