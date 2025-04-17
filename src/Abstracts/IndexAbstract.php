<?php

namespace Pkg6\Elasticsearch\Abstracts;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Pkg6\Elasticsearch\Contracts\IndexInterface;

abstract class IndexAbstract implements IndexInterface
{
    protected string $index;
    protected string $type = "doc";

    public function getIndex(): string
    {
        return $this->index;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getClient(): Client
    {
        return ClientBuilder::create()->build();
    }
}