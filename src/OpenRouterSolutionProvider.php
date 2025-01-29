<?php

namespace Dragon\OpenRouter;

use Illuminate\Support\Str;
use OpenAI\Client;
use Spatie\Ignition\Contracts\HasSolutionsForThrowable;
use Throwable;

class OpenRouterSolutionProvider implements HasSolutionsForThrowable
{
    public function canSolve(Throwable $throwable): bool
    {
        if(!class_exists(Client::class)){
            return false;
        }

        if(config('openrouter-solution.api_key') === null){
            return false;
        }

        return true;
    }

    public function getSolutions(Throwable $throwable): array
    {
        return [
            new OpenRouterSolution(
                throwable: $throwable,
                openAiKey: config('openrouter-solution.api_key'),
                cache: cache()->store(config('cache.default')),
                cacheTtlInSeconds: 60,
                applicationType: 'Laravel ' . Str::before(app()->version(), '.'),
                applicationPath: base_path(),
                openAiModel: config('openrouter-solution.model', 'gpt-3.5-turbo'),
            ),
        ];
    }
}