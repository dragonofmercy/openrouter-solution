# OpenRouter Solution for Spatie Ignition

AI Solution provider using OpenRouter service for Spatie Ignition Error Solution

## Usage

````bash
composer require dragonofmercy/openrouter-solution
````

### Publish configuration file

````bash
php artisan vendor:publish --tag="openrouter-solution-config"
````

### Register solution provider in Ignition

Open `ignition.php` in your `Config` directory.   
Just add `\Dragon\OpenRouter\OpenRouterSolutionProvider::class` in the `solution_providers` array.

````php
'solution_providers' => [
    ...
    UnknownMysql8CollationSolutionProvider::class,
    UnknownMariadbCollationSolutionProvider::class,
    \Dragon\OpenRouter\OpenRouterSolutionProvider::class
],
````

---

This is a home package no support will be provided!  
If this project help to increase your productivity, you can give me a cup of coffee :)

<a href="https://ko-fi.com/dragonofmercy" target="_blank"><img src="https://cdn.ko-fi.com/cdn/kofi2.png?v=3" alt="Donate" width="160px" /></a>