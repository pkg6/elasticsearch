<?php

namespace Pkg6\Elasticsearch\Contracts;

use Elasticsearch\Client;

interface IndexInterface
{
    /**
     * @return string
     */
    public function getIndex(): string;

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return Client
     */
    public function getClient(): Client;
}