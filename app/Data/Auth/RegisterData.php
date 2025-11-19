<?php

namespace App\Data\Auth;

use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Password;
use Spatie\LaravelData\Attributes\Validation\Regex;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Data;

class RegisterData extends Data
{
    public function __construct(
        #[Email()]
        #[Unique('users', 'email')]
        public string $email,
        #[Regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[_#!%]).*$/')]
        public string $password
    ) {}
}