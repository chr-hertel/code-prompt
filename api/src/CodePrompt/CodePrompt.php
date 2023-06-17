<?php

declare(strict_types=1);

namespace App\CodePrompt;

final readonly class CodePrompt
{
    public function __construct(
        public string $language,
        public string $code,
        public string $prompt,
    ) {
    }
}