<?php

return [
    /*
    |--------------------------------------------------------------------------
    | N8n Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains the configuration options for the Laravel N8n package.
    |
    */

    'base_url' => env('N8N_BASE_URL', 'http://localhost:5678'),
    
    'api_key' => env('N8N_API_KEY'),
    
    'webhook_path' => env('N8N_WEBHOOK_PATH', '/webhook'),
    
    'timeout' => env('N8N_TIMEOUT', 30),
];