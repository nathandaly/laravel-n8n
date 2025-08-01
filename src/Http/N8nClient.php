<?php

declare(strict_types=1);

namespace NateDaly\N8n\Http;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class N8nClient
{
    protected string $baseUrl;

    protected string $token;

    public function __construct(string $baseUrl, string $token)
    {
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->token = $token;
    }

    /**
     * @param string $verb
     * @param string $url
     * @param array<string, string> $options
     * @return Response
     */
    public function send(string $verb, string $url, array $options = []): Response
    {
        return Http::withToken($this->token)
            ->$verb("{$this->baseUrl}/{$url}", $options)
            ->throw();
    }
}
