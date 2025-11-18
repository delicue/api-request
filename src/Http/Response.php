<?php

namespace Api\Http;

final class Response
{
    public function __construct(public int $status, public array $headers, public string $body)
    {
    }

    public function send()
    {
        http_response_code($this->status);
        foreach ($this->headers as $name => $value) {
            header("$name: $value");
        }
        echo $this->body;
    }
}