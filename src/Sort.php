<?php

namespace Pkg6\Elasticsearch;

use Pkg6\Elasticsearch\Contracts\SortInterface;

class Sort implements SortInterface
{
    protected array $sort = [];

    public function sort(string $field, string $order = "asc")
    {
        $this->sort[] = [
            $field => [
                'order' => $order,
            ]
        ];
    }

    public function jsonSerialize()
    {
        return $this->sort;
    }
}