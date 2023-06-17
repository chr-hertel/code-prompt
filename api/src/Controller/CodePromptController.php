<?php

declare(strict_types=1);

namespace App\Controller;

use App\CodePrompt\Client;
use App\CodePrompt\CodePrompt;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final readonly class CodePromptController
{
    public function __construct(
        private Client $client,
    ) {
    }

    #[Route('/code-prompt', name: 'code_prompt', methods: 'POST')]
    public function __invoke(#[MapRequestPayload] CodePrompt $codePrompt): JsonResponse
    {
        return new JsonResponse(
            $this->client->execute($codePrompt)
        );
    }
}