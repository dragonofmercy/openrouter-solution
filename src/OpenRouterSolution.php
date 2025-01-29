<?php

namespace Dragon\OpenRouter;

use OpenAI\Factory;
use Spatie\ErrorSolutions\Solutions\OpenAi\OpenAiSolution;
use Spatie\ErrorSolutions\Solutions\OpenAi\OpenAiSolutionResponse;

class OpenRouterSolution extends OpenAiSolution
{
    public function getAiSolution(): ?OpenAiSolutionResponse
    {
        $solution = $this->cache->get($this->getCacheKey());

        if($solution){
            return new OpenAiSolutionResponse($solution);
        }

        $solutionText = $this->getClient($this->openAiKey)
            ->chat()
            ->create([
                'model' => $this->getModel(),
                'messages' => [['role' => 'user', 'content' => $this->prompt]],
                'max_tokens' => 1000,
                'temperature' => 0,
            ])->choices[0]->message->content;

        $this->cache->set($this->getCacheKey(), $solutionText, $this->cacheTtlInSeconds);

        return new OpenAiSolutionResponse($solutionText);
    }

    protected function getClient(string $apiKey, ?string $organization = null, ?string $project = null)
    {
        return (new Factory())
            ->withBaseUri('https://openrouter.ai/api/v1')
            ->withApiKey($apiKey)
            ->withOrganization($organization)
            ->withProject($project)
            ->withHttpHeader('OpenAI-Beta', 'assistants=v2')
            ->make();
    }
}