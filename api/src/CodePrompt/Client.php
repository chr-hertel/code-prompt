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

    public function execute(CodePrompt $codePrompt): Response
    {
        $message = 'Respond only with the code.';
        $content = sprintf('Given this %s code: ```%s``` %s. %s', $codePrompt->language, $codePrompt->code, $codePrompt->prompt, $message);

        $result = $this->client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'assistant', 'content' => $content],
            ],
        ]);

        $code = u($result->choices[0]->message->content);
        $languageMatch = $code->match('/^```([a-z]+)/');
        $language = isset($languageMatch[1]) ? $languageMatch[1] : $codePrompt->language;
        $after = isset($languageMatch[0]) ? $languageMatch[0] : '```';

        return new Response(
            $language,
            $code->after($after)->beforeLast('```')->toString(),
        );
    }
}