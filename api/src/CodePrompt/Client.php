<?php

declare(strict_types=1);

namespace App\CodePrompt;

use OpenAI\Client as OpenAIClient;

use function Symfony\Component\String\u;

final readonly class Client
{
    public function __construct(
        private OpenAIClient $client,
    ) {
    }

    public function execute(CodePrompt $codePrompt): string
    {
        $message = 'Respond only with the code.';
        $content = sprintf('Given this %s code: ```%s``` %s. %s', $codePrompt->language, $codePrompt->code, $codePrompt->prompt, $message);
        dump($content);
        $result = $this->client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'assistant', 'content' => $content],
            ],
        ]);

        dump($result);

        return $result->choices[0]->message->content;
    }
}