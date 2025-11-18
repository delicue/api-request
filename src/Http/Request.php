<?php

namespace Api\Http;

final class Request
{
    public function __construct(public string $method, public string $uri, public array $headers, public string $body)
    {
    }

    public function queryParams(): array
    {
        $query = parse_url($this->uri, PHP_URL_QUERY);
        parse_str($query ?? '', $params);
        return $params;
    }
}