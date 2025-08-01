<?php

declare(strict_types=1);

namespace NateDaly\N8n\Http;

use Illuminate\Contracts\Foundation\Application;
use InvalidArgumentException;
use NateDaly\N8n\Http\N8nClient as Client;

class N8nConnector
{
    public function __construct(
        private readonly Client $client
    ) {}

    public static function register(Application $app): void
    {
        $app->bind(
            abstract: __CLASS__,
            concrete: function () {
                $baseUrl = config('laravel-n8n.base_url');
                $token = config('laravel-n8n.api_token');

                if (!is_string($baseUrl) || !is_string($token)) {
                    throw new InvalidArgumentException('n8n.base_url and n8n.token must be strings');
                }

                return new N8nConnector(
                    client: new Client(
                        baseUrl: $baseUrl,
                        token: $token,
                    ),
                );
            },
        );
    }

    public function getN8nClient(): Client
    {
        return $this->client;
    }

    /**
     * @param string $workflowId
     * @param array<string, string> $data
     * @return array<string, mixed>
     */
    public function triggerWorkflow(string $workflowId, array $data = []): array
    {
        $response = $this->client
            ->send('post', "webhook/{$workflowId}", $data)
            ->json();

        return is_array($response) ? $response : [];
    }
}
