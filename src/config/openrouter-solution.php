<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Api Key
    |--------------------------------------------------------------------------
    |
    | Use this option to set your OpenRouter api key.
    | To generate a key, go to https://openrouter.ai/settings/keys
    |
    */

    'api_key' => env('OPENROUTER_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | AI model
    |--------------------------------------------------------------------------
    |
    | Use this option to choose which model you want to use.
    | Go to https://openrouter.ai/models to see the list of available models.
    | To be sure to use the correct model name, click on a model and then go to
    | the API tab, scroll down a little bit to see the samples. You will see
    | the model name just after the "model:" keyword.
    |
    */

    'model' => env('OPENROUTER_MODEL', 'gpt-3.5-turbo')

];