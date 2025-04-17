<?php

namespace Pkg6\Elasticsearch\Conditions;

class Exists extends ConditionAbstract
{
    protected string $method = 'exists';

    public function __construct(string $field)
    {
        parent::__construct($field, "");
    }

    public function toArray(): array
    {
        return [
            $this->method => [
                'field' => $this->value
            ]
        ];
    }
}