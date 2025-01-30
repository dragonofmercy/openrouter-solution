# OpenRouter Solution for Spatie Ignition

AI Solution provider using [OpenRouter.ai](https://openrouter.ai) service for Spatie Ignition Error Solution

### Installation

```bash
composer require dragonofmercy/openrouter-solution --dev
```

### Publish configuration file

```bash
php artisan vendor:publish --tag="openrouter-solution-config"
```

### Register solution provider in Ignition

Open `ignition.php` in your `Config` directory.   
Just add `\Dragon\OpenRouter\OpenRouterSolutionProvider::class` in the `solution_providers` array.

```php
'solution_providers' => [
    ...
    UnknownMysql8CollationSolutionProvider::class,
    UnknownMariadbCollationSolutionProvider::class,
    \Dragon\OpenRouter\OpenRouterSolutionProvider::class
],
```

### Configure your Api Key

Go to https://openrouter.ai/settings/keys and retrieve new api key.  
Just update your `.env`

```dotenv
OPENROUTER_API_KEY={your-api-key}
OPENROUTER_MODEL=gpt-3.5-turbo
```

> [!WARNING] 
> Many models are not free, so you'll need to purchase tokens to use them.

---

If this project help to increase your productivity, you can give me a cup of coffee :)

<a href="https://ko-fi.com/dragonofmercy" target="_blank"><img src="https://cdn.ko-fi.com/cdn/kofi2.png?v=3" alt="Donate" width="160px" /></a>