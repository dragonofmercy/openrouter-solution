<?php

namespace Dragon\OpenRouter;

use Illuminate\Support\ServiceProvider;

class OpenRouterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerConfig();
    }

    public function boot(): void
    {
        if(app()->runningInConsole()){
            $this->publishConfig();
        }
    }

    protected function publishConfig(): void
    {
        $this->publishes([
            __DIR__ . '/config/openrouter-solution.php' => config_path('openrouter-solution.php')
        ], 'openrouter-solution-config');
    }

    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/config/openrouter-solution.php', 'openrouter-solution');
    }
}